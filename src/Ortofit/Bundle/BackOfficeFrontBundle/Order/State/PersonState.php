<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\FamilyStatusManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator\In\NewPersonFormator;
use Ortofit\Bundle\BackOfficeFrontBundle\Order\Validator\NewPersonValidator;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class PersonState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class PersonState extends AbstractState
{

    const PARAM_NAME_IS_CLIENT       = 'isClient';
    const PARAM_NAME_FAMILY_STATUS   = 'familyStatus';
    const PARAM_NAME_FAMILY_STATUSES = 'familyStatuses';

    const ACTION_PERSON_CLIENT = 'personClient';
    const ACTION_PERSON_CHOOSE = 'personChoose';
    const ACTION_PERSON_NEW    = 'personNew';

    /**
     * @var Person
     */
    private $person;

    /**
     * @var PersonManager
     */
    private $personManager;

    /**
     * @var FamilyStatusManager
     */
    private $familyStatusManager;

    /**
     * @var string
     */
    protected $action;

    /**
     * @param ParameterBag $bag
     *
     * @throws \Exception
     */
    private function validation(ParameterBag $bag)
    {
        $requiredParams = [self::PARAM_NAME_ACTION, self::PARAM_NAME_APP_ID];
        foreach ($requiredParams as $name) {
            if (!$bag->has($name)) {
                throw new \Exception(printf('Request doesn\'t have parameter << %s >>', $name));
            }
        }
        $availableActions = [self::ACTION_PERSON_CHOOSE, self::ACTION_PERSON_CLIENT, self::ACTION_PERSON_NEW];
        if (!in_array($bag->has(self::PARAM_NAME_ACTION), $availableActions)) {
            throw new \Exception(printf('Parameter << %s >> has invalid value <<%s>>', self::PARAM_NAME_ACTION, $bag->has(self::PARAM_NAME_ACTION)));
        }
        if (($bag->get(self::PARAM_NAME_ACTION) == self::ACTION_PERSON_CHOOSE) &&
            (!$bag->has(self::PARAM_NAME_PERSON_ID))
        ) {
            throw new \Exception(printf('Request doesn\'t have parameter << %s >>', self::PARAM_NAME_PERSON_ID));
        }
    }

    /**
     * @param ParameterBag $bag
     */
    private function processData(ParameterBag $bag)
    {
        $this->validation($bag);
        $this->action = $bag->get(self::PARAM_NAME_ACTION);
        switch($this->action) {
            case self::ACTION_PERSON_NEW:
                $this->processPersonNew($bag);
            break;
            case self::ACTION_PERSON_CLIENT:
                $this->processPersonClient($bag);
            break;
            case self::ACTION_PERSON_CHOOSE :
                $this->processPersonChoose($bag);
            break;
        }
    }

    /**
     * @param ParameterBag $bag
     *
     * @throws \Exception
     */
    private function processPersonNew(ParameterBag $bag)
    {
        $bag->set('client', $this->app->getClient());
        $validator = new NewPersonValidator($bag);
        if (!$validator->isValid()) {
            return;
        }
        $bag->set('familyStatus', $this->familyStatusManager->get($bag->get('familyStatusId')));
        $formator        = new NewPersonFormator($bag);
        $this->person    = $this->personManager->create($formator->getData());
        $this->completed = true;
    }

    /**
     * @param ParameterBag $bag
     */
    private function processPersonChoose(ParameterBag $bag)
    {
        $this->person = $this->personManager->get($bag->get(self::PARAM_NAME_PERSON_ID));

        $this->completed = true;
    }

    /**
     * @param ParameterBag $bag
     */
    private function processPersonClient(ParameterBag $bag)
    {
        $client = $this->app->getClient();
        if ($client->getPerson()) {
            $this->person = $client->getPerson();
            $this->completed = true;
            return;
        }
        $this->processPersonNew($bag);
    }

    /**
     * @param FamilyStatusManager $familyStatusManager
     */
    public function setFamilyStatusManager(FamilyStatusManager $familyStatusManager)
    {
        $this->familyStatusManager = $familyStatusManager;
    }

    /**
     * @throws \Exception
     */
    public function process()
    {
        $this->init();
        $this->processData($this->getRequest()->request);
        if ($this->completed) {
            if (null == $this->person) {
                throw new \Exception('Person is null');
            }
            $this->getRequest()->request->set(self::PARAM_NAME_PERSON_ID, $this->person->getId());
        }
    }

    public function getId()
    {
        return 'person_state';
    }

    /**
     * @param PersonManager $personManager
     */
    public function setPersonManager(PersonManager $personManager)
    {
        $this->personManager = $personManager;
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        $data = [
            self::PARAM_NAME_APP             => $this->app,
            self::PARAM_NAME_ACTION          => $this->action,
            self::PARAM_NAME_FAMILY_STATUSES => $this->familyStatusManager->all()
        ];
        if ($this->action == self::ACTION_PERSON_CLIENT) {
            $data[self::PARAM_NAME_IS_CLIENT] = true;
        }

        return $data;
    }

}
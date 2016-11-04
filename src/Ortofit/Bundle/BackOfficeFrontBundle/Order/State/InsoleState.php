<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\InsoleManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\InsoleTypeManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class InsoleState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class InsoleState extends AbstractState
{

    const PARAM_NAME_INSOLE_TYPES = 'insoleTypes';
    const PARAM_NAME_INSOLES      = 'insoles';

    /**
     * @var ServiceManager
     */
    private $serviceManager;
    /**
     * @var InsoleManager
     */
    private $insoleManager;
    /**
     * @var InsoleTypeManager
     */
    private $insoleTypeManager;
    /**
     * @var PersonManager
     */
    private $personManager;

    /**
     * @var Person
     */
    private $person;

    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function setInsoleManager($insoleManager)
    {
        $this->insoleManager = $insoleManager;
    }

    public function setInsoleTypeManager($insoleTypeManager)
    {
        $this->insoleTypeManager = $insoleTypeManager;
    }

    public function setPersonManager($personManager)
    {
        $this->personManager = $personManager;
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        return [
            self::PARAM_NAME_APP          => $this->app,
            self::PARAM_NAME_INSOLE_TYPES => $this->insoleTypeManager->all(),
            self::PARAM_NAME_PERSON       => $this->person
        ];
    }


    private function saveData()
    {
        $insoles     = $this->getRequest()->get(self::PARAM_NAME_INSOLES);
        foreach ($insoles as $insole) {
            $data = [
                'size'        => $insole['size'],
                'person'      => $this->person,
                'appointment' => $this->app,
                'type'        => $this->insoleTypeManager->rGet($insole['type']),
            ];
            $this->insoleManager->create(new ParameterBag($data));
        }

    }

    /**
     * @return boolean
     */
    private function hasInsoles()
    {
        $insoles = $this->getRequest()->get(self::PARAM_NAME_INSOLES);
//        file_put_contents('/tmp/insole.log', print_r($insoles, true)."\n".time()."\n", FILE_APPEND);
        return !empty($insoles);
    }
    /**
     * @return void
     * @throws \Exception
     */
    public function process()
    {
        $this->init();
        $personId     = $this->getRequest()->get(self::PARAM_NAME_PERSON_ID);
        $this->person = $this->personManager->get($personId);

        if ($this->hasInsoles()) {
            $this->saveData();
            $this->completed = true;
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'insole_state';
    }
}
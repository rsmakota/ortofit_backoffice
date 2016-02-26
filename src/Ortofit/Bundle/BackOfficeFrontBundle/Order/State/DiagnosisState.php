<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\DiagnosisManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager;
use Symfony\Component\HttpFoundation\ParameterBag;


/**
 * Class DiagnosisState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class DiagnosisState extends AbstractState
{
    const PARAM_NAME_DESCRIPTION = 'description';

    /**
     * @var Person
     */
    private $person;
    /**
     * @var PersonManager
     */
    private $personManager;
    /**
     * @var DiagnosisManager
     */
    private $diagnosisManager;

    public function setDiagnosisManager($diagnosisManager)
    {
        $this->diagnosisManager = $diagnosisManager;
    }

    /**
     * @param PersonManager $personManager
     */
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
            self::PARAM_NAME_APP    => $this->app,
            self::PARAM_NAME_PERSON => $this->person,
        ];
    }
    protected function init()
    {
        parent::init();
        $request      = $this->getRequest();
        $this->person = $this->personManager->get($request->get(self::PARAM_NAME_PERSON_ID));
    }

    /**
     * @return boolean
     */
    private function hasDescription()
    {
        $request  = $this->getRequest()->request;
        if ($request->has(self::PARAM_NAME_DESCRIPTION)) {
            return true;
        }

        return false;
    }
    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        if ($this->hasDescription()) {
            $this->saveDiagnosis();
            $this->completed = true;
        }
    }

    public function getId()
    {
        return 'diagnosis_state';
    }

    /**
     * @return void
     */
    private function saveDiagnosis()
    {
        $data = [
            'description' => $this->getRequest()->get(self::PARAM_NAME_DESCRIPTION),
            'person'      => $this->person
        ];
        $this->diagnosisManager->create(new ParameterBag($data));
    }
}
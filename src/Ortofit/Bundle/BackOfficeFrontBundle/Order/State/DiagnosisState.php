<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\DiagnosisManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager;

/**
 * Class DiagnosisState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class DiagnosisState extends AbstractState
{
    /**
     * @var integer
     */
    private $appId;
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
            'appId'   => $this->appId,
            'personId'=> $this->person->getId(),

        ];
    }

    /**
     * @return void
     */
    public function process()
    {
        $request      = $this->getRequest();
        $this->appId  = $request->get('appId');
        $this->person = $this->personManager->get($request->get('personId'));
    }

    public function getId()
    {
        return 'diagnosis_state';
    }
}
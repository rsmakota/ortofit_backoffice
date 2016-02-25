<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonServiceManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ServiceState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class ServiceState extends AbstractState
{
    const PARAM_NAME_SERVICES = 'services';

    /**
     * @var Person
     */
    private $person;
    /**
     * @var PersonServiceManager
     */
    private $personServiceManager;
    /**
     * @var ServiceManager
     */
    private $serviceManager;
    /**
     * @var PersonManager
     */
    private $personManager;
    /**
     * @param PersonServiceManager $personServiceManager
     */
    public function setPersonServiceManager(PersonServiceManager $personServiceManager)
    {
        $this->personServiceManager = $personServiceManager;
    }

    /**
     * @param PersonManager $personManager
     */
    public function setPersonManager(PersonManager $personManager)
    {
        $this->personManager = $personManager;
    }

    /**
     * @param ServiceManager $serviceManager
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    protected function init()
    {

        parent::init();
        $personId     = $this->getRequest()->get(self::PARAM_NAME_PERSON_ID);
        $this->person = $this->personManager->get($personId);
    }

    protected function hasServices()
    {
        if (null != $this->getRequest()->get(self::PARAM_NAME_SERVICES)) {
            return true;
        }

        return false;
    }

    /**
     * @return void
     */
    private function saveData()
    {
        $services = $this->getRequest()->get(self::PARAM_NAME_SERVICES);
        foreach ($services as $serviceId) {
            $service = $this->serviceManager->get($serviceId);
            $data = [
                'service'     => $service,
                'appointment' => $this->app,
                'person'      => $this->person,
            ];
            $this->personServiceManager->create(new ParameterBag($data));
        }
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

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        if ($this->hasServices()) {
            $this->saveData();
            $this->completed;
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'service_state';
    }
}
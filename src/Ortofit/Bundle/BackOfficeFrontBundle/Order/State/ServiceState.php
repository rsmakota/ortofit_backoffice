<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppReminderManager;
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
    const PARAM_NAME_SERVICES  = 'services';
    const PARAM_NAME_FORWARDER = 'forwarder';
    const PARAM_NAME_REMIND    = 'remind';

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
     * @var AppReminderManager
     */
    private $appReminderManager;
    /**
     * @return void
     */
    private function saveData()
    {
        $request = $this->getRequest()->request;
        $services = $request->get(self::PARAM_NAME_SERVICES);
        foreach ($services as $serviceId) {
            $service = $this->serviceManager->get($serviceId);
            $data = [
                'service'     => $service,
                'appointment' => $this->app,
                'person'      => $this->person,
            ];
            $this->personServiceManager->create(new ParameterBag($data));
        }
        $this->app->setForwarder($request->get(self::PARAM_NAME_FORWARDER));
        $this->appManager->success($this->app);

    }

    /**
     * @return Service[]
     */
    private function getServices()
    {
        return $this->serviceManager->all();
    }

    /**
     * @return boolean
     */
    protected function hasServices()
    {
        return $this->getRequest()->get(self::PARAM_NAME_SERVICES);
    }

    /**
     * @param AppReminderManager $appReminderManager
     */
    public function setAppReminderManager($appReminderManager)
    {
        $this->appReminderManager = $appReminderManager;
    }

    /**
     * @return void
     */
    protected function init()
    {

        parent::init();
        $personId     = $this->getRequest()->get(self::PARAM_NAME_PERSON_ID);
        $this->person = $this->personManager->get($personId);
    }
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


    /**
     * @return array
     */
    public function getResponseData()
    {
        return [
            self::PARAM_NAME_APP      => $this->app,
            self::PARAM_NAME_PERSON   => $this->person,
            self::PARAM_NAME_SERVICES => $this->getServices()
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
            $this->completed = true;
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
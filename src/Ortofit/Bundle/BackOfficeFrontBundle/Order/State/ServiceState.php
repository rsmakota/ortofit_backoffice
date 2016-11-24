<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\Entity\PersonService;
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

    const PARAM_NAME_REMIND          = 'remind';
    const PARAM_NAME_DESCRIPTION     = 'description';
    const PARAM_NAME_STORED_SERVICES = 'stored_services';
    const DATE_TIME_FORMAT           = 'd/m/Y H:i:s';

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
     * @param array $services
     */
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\Entity\EntityInterface[]
     */
    private function getStoredServiceTypeIds()
    {
        $services = $this->personServiceManager->findBy([
            'person'      => $this->person,
            'appointment' => $this->app
        ]);
        $ids = [];
        foreach ($services as $service) {
            $ids[] = $service->getId();
        }
        return $ids;
    }

    private function saveServices(array $services)
    {
        $storedServiceTypes = $this->getStoredServiceTypeIds();
        $storedAndNeed = [];
        foreach ($storedServiceTypes as $storedServiceId) {
            if (in_array($storedServiceId, $services)) {
                $storedAndNeed[] = $storedServiceId;
                continue;
            }
            $this->personServiceManager->remove($storedServiceId);
        }
        foreach ($services as $serviceId) {
            if ((count($storedAndNeed) > 0) && in_array($serviceId, $storedAndNeed)) {
                continue;
            }
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
     * @param string $remindDate
     * @param string $description
     */
    private function saveRemind($remindDate, $description)
    {
        if (empty($remindDate)) {
            return;
        }
        $data = [
            'dateTime'    => \DateTime::createFromFormat(self::DATE_TIME_FORMAT, $remindDate.' 00:00:00'),
            'appointment' => $this->app,
            'person'      => $this->person,
            'description' => $description
        ];
        $this->appReminderManager->create(new ParameterBag($data));
    }

    /**
     * @return void
     */
    private function saveData()
    {
        $request     = $this->getRequest()->request;
        $services    = $request->get(self::PARAM_NAME_SERVICES);
        $description = $request->get(self::PARAM_NAME_DESCRIPTION);
        $remindDate  = $request->get(self::PARAM_NAME_REMIND);

        $this->saveServices($services);
        $this->saveRemind($remindDate, $description);
//        $this->appManager->success($this->app);
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
     * @throws \Exception
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
            self::PARAM_NAME_APP             => $this->app,
            self::PARAM_NAME_PERSON          => $this->person,
            self::PARAM_NAME_SERVICES        => $this->getServices(),
            self::PARAM_NAME_STORED_SERVICES => $this->getStoredServiceTypeIds()
        ];
    }

    /**
     * @return void
     * @throws \Exception
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
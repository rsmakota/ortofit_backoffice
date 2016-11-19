<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use FOS\UserBundle\Doctrine\GroupManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientDirectionManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\CountryManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment\AppointmentViewModel;

/**
 * Class AppointmentModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider
 */
class AppointmentViewModelProvider extends AbstractRequestModelProvider
{
    /**
     * @var GroupManager
     */
    private $groupManager;
    /**
     * @var ServiceManager
     */
    private $serviceManager;
    /**
     * @var ClientDirectionManager
     */
    private $directionManager;
    /**
     * @var OfficeManager
     */
    private $officeManager;
    /**
     * @var AppointmentManager
     */
    private $appManager;
    /**
     * @var CountryManager
     */
    private $countryManager;
    /**
     * @var ScheduleManager
     */
    private $scheduleManager;
    
    /**
     * @param GroupManager $groupManager
     */
    public function setGroupManager($groupManager)
    {
        $this->groupManager = $groupManager;
    }

    public function setScheduleManager($scheduleManager)
    {
        $this->scheduleManager = $scheduleManager;
    }

    /**
     * @param ServiceManager $serviceManager
     */
    public function setServiceManager($serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    /**
     * @param ClientDirectionManager $directionManager
     */
    public function setDirectionManager($directionManager)
    {
        $this->directionManager = $directionManager;
    }

    /**
     * @param OfficeManager $officeManager
     */
    public function setOfficeManager($officeManager)
    {
        $this->officeManager = $officeManager;
    }

    /**
     * @param AppointmentManager $appManager
     */
    public function setAppManager($appManager)
    {
        $this->appManager = $appManager;
    }

    public function setCountryManager($countryManager)
    {
        $this->countryManager = $countryManager;
    }

    /**
     * @return array
     */
    private function getDoctors()
    {
        $group = $this->groupManager->findGroupBy(['name' => 'Doctor']);

        return $group->getUsers();
    }

    /**
     * @return AppointmentViewModel
     */
    protected function createModel()
    {
        $model              = new AppointmentViewModel();
        $this->fillModelFromRequest($model);
        $model->prefix      = $this->countryManager->getDefault()->getPrefix();
        $model->doctors     = $this->getDoctors();
        $model->offices     = $this->officeManager->all();
        $model->services    = $this->serviceManager->all();
//        $model->directions = $this->directionManager->all();
        $model->directionId = $this->directionManager->getUnknown()->getId();

        return $model;
    }

    /**
     * @param AppointmentViewModel $model
     *
     * @return AppointmentViewModel
     */
    protected function completeFromApp($model)
    {
        /** @var Appointment $app */
        $app = $this->appManager->get($model->appId);

        $model->clientId    = $app->getClient()->getId();
        $model->msisdn      = $app->getClient()->getMsisdn();
        $model->clientName  = $app->getClient()->getName();
        $model->date        = $app->getDateTime()->format('d/m/Y');
        $model->time        = $app->getDateTime()->format('H:i');
        $model->serviceId   = $app->getService()->getId();
        $model->directionId = $app->getClient()->getClientDirection()->getId();
        $model->officeId    = $app->getOffice()->getId();
        $model->duration    = $app->getDuration();
        $model->gender      = $app->getClient()->getGender();

        return $model;
    }

    /**
     * @param AppointmentViewModel $model
     *
     * @return AppointmentViewModel
     */
    protected function completeModel($model)
    {
        if (null !== $model->appId) {
            return $this->completeFromApp($model);
        }
        $date = \DateTime::createFromFormat('d/m/Y H:i', $model->date.' '.$model->time);
        $model->availableDoctors = [];
        if (!$model->officeId) {
            return $model;
        }
        $schedules = $this->scheduleManager->findSchedulesByDate($date, $this->officeManager->get($model->officeId));

        foreach ($schedules as $schedule) {
            $doctor = $schedule->getUser();
            $model->availableDoctors[$doctor->getId()] = $doctor;
        }
        return $model;
    }

    /**
     * @return AppointmentViewModel
     */
    public function getModel()
    {
        $model = $this->createModel();

        return $this->completeModel($model);
    }

}
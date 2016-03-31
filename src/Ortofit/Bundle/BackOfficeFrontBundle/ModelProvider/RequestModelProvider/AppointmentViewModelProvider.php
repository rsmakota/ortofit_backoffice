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
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment\AppointmentViewModel;


/**
 * Class AppointmentModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider
 */
class AppointmentViewModelProvider extends AbstractRequestModelProvider
{

    const PARAM_APP_ID    = 'appId';
    const PARAM_DOCTOR_ID = 'doctorId';
    const PARAM_OFFICE_ID = 'officeId';
    const PARAM_DATE      = 'date';
    const PARAM_TIME      = 'time';
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
     * @param GroupManager $groupManager
     */
    public function setGroupManager($groupManager)
    {
        $this->groupManager = $groupManager;
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
        $model             = new AppointmentViewModel();
        $model->prefix     = $this->countryManager->getDefault()->getPrefix();
        $model->doctors    = $this->getDoctors();
        $model->offices    = $this->officeManager->all();
        $model->services   = $this->serviceManager->all();
        $model->directions = $this->directionManager->all();

        return $model;
    }

    /**
     * @param AppointmentViewModel $model
     * @param integer              $appId
     *
     * @return AppointmentViewModel
     */
    protected function completeFromApp($model, $appId)
    {
        /** @var Appointment $app */
        $app = $this->appManager->get($appId);

        $model->appId       = $appId;
        $model->clientId    = $app->getClient()->getId();
        $model->msisdn      = $app->getClient()->getMsisdn();
        $model->clientName  = $app->getClient()->getName();
        $model->date        = $app->getDateTime()->format('d/m/Y');
        $model->time        = $app->getDateTime()->format('H:i');
        $model->serviceId   = $app->getService()->getId();
        $model->directionId = $app->getClient()->getClientDirection()->getId();
        $model->officeId    = $app->getOffice()->getId();
        $model->duration    = $app->getDuration();
        $model->description = $app->getDescription();
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
        $request         = $this->getRequest();
        $appId           = $request->get(self::PARAM_APP_ID);
        $model->doctorId = $request->get(self::PARAM_DOCTOR_ID);
        $model->officeId = $request->get(self::PARAM_OFFICE_ID);
        $model->date     = $request->get(self::PARAM_DATE);
        $model->time     = $request->get(self::PARAM_TIME);

        if ($appId != null) {
            return $this->completeFromApp($model, $appId);
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
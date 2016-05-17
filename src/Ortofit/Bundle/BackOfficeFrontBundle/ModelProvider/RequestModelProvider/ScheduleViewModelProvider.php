<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use FOS\UserBundle\Doctrine\UserManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule\ScheduleViewModel;

/**
 * Class ClientViewModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider
 */
class ScheduleViewModelProvider extends AbstractRequestModelProvider
{
    public $time;
    /**
     * @var OfficeManager
     */
    private $officeManager;
    /**
     * @var UserManager
     */
    private $userManager;
    /**
     * @var ScheduleManager
     */
    private $scheduleManager;

    /**
     * @param OfficeManager $officeManager
     */
    public function setOfficeManager($officeManager)
    {
        $this->officeManager = $officeManager;
    }

    /**
     * @param UserManager $userManager
     */
    public function setUserManager($userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param $scheduleManager
     */
    public function setScheduleManager($scheduleManager)
    {
        $this->scheduleManager = $scheduleManager;
    }

    /**
     * @return ModelInterface
     */
    protected function createModel()
    {
        return new ScheduleViewModel();
    }

    /**
     * @return ModelInterface
     */
    public function getModel()
    {
        /** @var ScheduleViewModel $model */
        $model = parent::getModel();
        $model->doctor    = $this->userManager->findUserBy(['id'=>$model->doctorId]);
        $model->office    = $this->officeManager->rGet($model->officeId);
        $model->startTime = $model->time;
        if (null != $model->id) {
            /** @var Schedule $schedule */
            $schedule         = $this->scheduleManager->get($model->id);
            $model->schedule  = $schedule;
            $model->date      = $schedule->getStart()->format('d/m/Y');
            $model->startTime = $schedule->getStart()->format('H:i');
            $model->endTime   = $schedule->getEnd()->format('H:i');
            $model->office    = $schedule->getOffice();
            $model->doctor    = $schedule->getUser();
        }
        return $model;
    }
}
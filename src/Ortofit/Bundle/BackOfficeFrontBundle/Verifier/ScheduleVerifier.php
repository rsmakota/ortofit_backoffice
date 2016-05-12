<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Verifier;

use Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment\AppointmentViewModel;

/**
 * Class ScheduleVerifier
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Verifier
 */
class ScheduleVerifier implements VerifierInterface
{
    /**
     * @var ScheduleManager
     */
    private $scheduleManager;

    /**
     * ScheduleVerifier constructor.
     *
     * @param ScheduleManager $scheduleManager
     */
    public function __construct(ScheduleManager $scheduleManager)
    {
        $this->scheduleManager = $scheduleManager;
    }

    /**
     * @param AppointmentViewModel $model
     *
     * @return boolean
     */
    public function isValid($model)
    {
        $schedule = $this->scheduleManager->findOneByDate($model->getDateTime(), $model->getOffice(), $model->getDoctor());
        if ($schedule) {
            return true;
        }

        return false;
    }
}
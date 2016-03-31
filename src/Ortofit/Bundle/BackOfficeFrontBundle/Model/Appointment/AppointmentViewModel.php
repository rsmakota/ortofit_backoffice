<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment;

use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;

/**
 * Class AppointmentModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment
 */
class AppointmentViewModel extends AppointmentModel
{
    /**
     * @var Service[]
     */
    public $services;

    /**
     * @var ClientDirection[]
     */
    public $directions;

    /**
     * @var User[]
     */
    public $doctors;

    /**
     * @var Office[]
     */
    public $offices;

    /**
     * @return boolean|string
     */
    public function getDoctorName()
    {
        if (null == $this->doctorId) {
            return false;
        }
        foreach ($this->doctors as $doctor) {
            if ($doctor->getId() == $this->doctorId) {
                return $doctor->getName();
            }
        }

        return false;
    }

    /**
     * @return boolean|string
     */
    public function getOfficeName()
    {
        if (null == $this->officeId) {
            return false;
        }

        foreach ($this->offices as $office) {
            if ($office->getId() == $this->officeId) {
                return $office->getName();
            }
        }

        return false;
    }
}
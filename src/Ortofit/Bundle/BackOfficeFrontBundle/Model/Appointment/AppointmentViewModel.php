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
     * @var User[]
     */
    public $availableDoctors;
    
    /**
     * @return boolean|string
     */
    public function getDoctorName()
    {
        return $this->getDoctor()->getName();
    }

    /**
     * @return null|string
     */
    public function getOfficeName()
    {
        return $this->getOffice()->getName();
    }

    /**
     * @return null|Office
     */
    public function getOffice()
    {
        if (null === $this->officeId) {
            return null;
        }
        foreach ($this->offices as $office) {
            if ($office->getId() == $this->officeId) {
                return $office;
            }
        }

        return null;
    }

    /**
     * @return boolean|User
     */
    public function getDoctor()
    {
        if (null === $this->doctorId) {
            return null;
        }

        foreach ($this->doctors as $doctor) {
            if ($doctor->getId() === $this->doctorId) {
                return $doctor;
            }
        }

        return null;
    }

    /**
     * Definite means that model has office, doctor and date
     * @return boolean
     */
    public function isDefinite()
    {
        $defFields = ['officeId', 'doctorId', 'date', 'time'];
        foreach ($defFields as $field) {
            if (null !== $this->$field) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return \DateTime::createFromFormat('d/m/Y H:i', $this->date.' '. $this->time);
    }
}
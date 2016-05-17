<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule;


use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\BaseModel;

/**
 * Class ScheduleModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule
 */
class ScheduleViewModel extends ScheduleModel
{
    /**
     * @var User
     */
    public $doctor;
    
    /**
     * @var Office
     */
    public $office;

    /**
     * @var string
     */
    public $time;
    
    /**
     * @var Schedule
     */
    public $schedule;
    /**
     * @return string
     */
    public function getDoctorName() 
    {
        return $this->doctor->getName(); 
    }

    /**
     * @return string
     */
    public function getOfficeName()
    {
        return $this->office->getName();
    }


}
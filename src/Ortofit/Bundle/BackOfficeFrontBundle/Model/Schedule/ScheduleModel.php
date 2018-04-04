<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule;


use Ortofit\Bundle\BackOfficeFrontBundle\Model\BaseModel;

/**
 * Class ScheduleModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule
 */
class ScheduleModel extends BaseModel
{
    public $id;
    public $doctorId;
    public $officeId;
    public $startTime;
    public $endTime;
    public $date;
}
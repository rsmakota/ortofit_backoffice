<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\BaseModel;

/**
 * Class AppointmentModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment
 */
class AppointmentModel extends BaseModel
{
    /**
     * @var string
     */
    public $msisdn;
    /**
     * @var string
     */
    public $clientName;
    /**
     * @var integer
     */
    public $directionId;
    /**
     * @var integer
     */
    public $officeId;
    /**
     * @var integer
     */
    public $serviceId;
    /**
     * @var string
     */
    public $date;
    /**
     * @var string
     */
    public $time;
    /**
     * @var integer
     */
    public $duration;
    /**
     * @var string
     */
    public $description;
    /**
     * @var integer
     */
    public $appId;
    /**
     * @var string
     */
    public $gender;
    /**
     * @var integer
     */
    public $clientId;
    /**
     * @var integer
     */
    public $doctorId;
    /**
     * @var integer
     */
    public $countryId;
    /**
     * @var string
     */
    public $prefix;
    /** @var  string */
    public $forwarder;
    /**
     * @var string
     */
    public $location;

    public $bold;
}
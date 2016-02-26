<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Schedule
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ortofit\Bundle\BackOfficeBundle\ORM\ScheduleRepository")
 * @ORM\Table(name="app_reminders")
 */
class AppReminder implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="date_time", type="datetime")
     */
    private $dateTime;
    /**
     * @ORM\ManyToOne(targetEntity="Appointment")
     * @ORM\JoinColumn(name="appointment_id", referencedColumnName="id")
     */
    private $appointment;
    /**
     * @ORM\ManyToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

    /**
     * @ORM\Column(type="string")
     */
    private $description;


    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function getAppointment()
    {
        return $this->appointment;
    }

    public function setAppointment($appointment)
    {
        $this->appointment = $appointment;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setPerson($person)
    {
        $this->person = $person;
    }


    /**
     * @return array
     */
    public function getData()
    {
        // TODO: Implement getData() method.
    }

    /**
     * @return string
     */
    static public function clazz()
    {
        return get_class();
    }
}
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
 * @ORM\Entity(repositoryClass="Ortofit\Bundle\BackOfficeBundle\ORM\AppReminderRepository")
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
     * @ORM\ManyToOne(targetEntity="Appointment", inversedBy="reminds" )
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

    /**
     * @ORM\Column(type="boolean")
     */
    private $processed = false;

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return Appointment
     */
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

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    public function setPerson($person)
    {
        $this->person = $person;
    }

    public function getProcessed()
    {
        return $this->processed;
    }

    public function setProcessed($processed)
    {
        $this->processed = $processed;
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
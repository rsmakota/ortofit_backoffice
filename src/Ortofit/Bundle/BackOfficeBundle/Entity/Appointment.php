<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Appointment
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ortofit\Bundle\BackOfficeBundle\ORM\AppointmentRepository")
 * @ORM\Table(name="appointments")
 */
class Appointment implements EntityInterface
{
    const STATE_NEW          = 1;
    const STATE_RECORD       = 2;
    const STATE_CLOSE_REASON = 3;
    const STATE_SUCCESS      = 4;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $dateTime;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @ORM\Column(type="integer")
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="Office")
     * @ORM\JoinColumn(name="office_id", referencedColumnName="id")
     */
    private $office;

    /**
     * @ORM\Column(type="string")
     */
    private $description = '';

    /**
     * This is time duration in minutes
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $forwarder;

    /**
     *  
     * @ORM\OneToMany(targetEntity="AppointmentReason", mappedBy="appointment")
     */
    private $appointmentReasons;

    /**
     * @ORM\OneToMany(targetEntity="PersonService", mappedBy="appointment")
     */
    private $personServices;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bold = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flyer = false;

    /**
     * @ORM\OneToMany(targetEntity="AppReminder", mappedBy="appointment")
     * @ORM\OrderBy({"dateTime" = "DESC"})
     */
    private $reminds;

    /**
     * @ORM\Column(type="boolean", name="phone_confirm")
     */
    private $phoneConfirm = false;

    /**
     * constructor.
     */
    public function __construct()
    {
        $this->state              = self::STATE_NEW;
        $this->created            = new \DateTime();
        $this->reminds            = new ArrayCollection();
        $this->personServices     = new ArrayCollection();
        $this->appointmentReasons = new ArrayCollection();
    }

    /**
     * @return boolean
     */
    public function getBold()
    {
        return $this->bold;
    }

    /**
     * @param boolean $bold
     */
    public function setBold($bold)
    {
        $this->bold = $bold;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return ArrayCollection
     */
    public function getAppointmentReasons()
    {
        return $this->appointmentReasons;
    }

    /**
     * @param $appointmentReasons
     */
    public function setAppointmentReasons($appointmentReasons)
    {
        $this->appointmentReasons = $appointmentReasons;
    }
    /**
     * @return ArrayCollection
     */
    public function getPersonServices()
    {
        return $this->personServices;
    }

    /**
     * @param ArrayCollection $personServices
     */
    public function setPersonServices($personServices)
    {
        $this->personServices = $personServices;
    }
    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param integer $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Office
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @param Office $office
     */
    public function setOffice($office)
    {
        $this->office = $office;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param integer $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param Service $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        /** @var \DateTime $end */
        $end = clone $this->dateTime;
        $end->modify('+'.$this->duration.' min');

        return $end;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getForwarder()
    {
        return $this->forwarder;
    }

    /**
     * @param string $forwarder
     */
    public function setForwarder($forwarder)
    {
        $this->forwarder = $forwarder;
    }

    /**
     * @return ArrayCollection
     */
    public function getReminds()
    {
        return $this->reminds;
    }

    /**
     * @param ArrayCollection $reminds
     */
    public function setReminds($reminds)
    {
        $this->reminds = $reminds;
    }

    /**
     * @return boolean
     */
    public function getFlyer()
    {
        return $this->flyer;
    }

    /**
     * @param boolean $flyer
     */
    public function setFlyer($flyer)
    {
        $this->flyer = $flyer;
    }

    public function getPhoneConfirm()
    {
        return $this->phoneConfirm;
    }

    public function setPhoneConfirm($phoneConfirm)
    {
        $this->phoneConfirm = $phoneConfirm;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'id'          => $this->id,
            'created'     => $this->created->format('Y-m-d H:i:s'),
            'dateTime'    => $this->dateTime->format('Y-m-d H:i:s'),
            'clientId'    => $this->getClient()->getId(),
            'state'       => $this->state,
            'office_id'   => $this->getOffice()->getId(),
            'description' => $this->description,
            'duration'    => $this->duration,
            'service_id'  => $this->getService()->getId(),
            'user_id'     => $this->getUser()->getId()
        ];
    }

}
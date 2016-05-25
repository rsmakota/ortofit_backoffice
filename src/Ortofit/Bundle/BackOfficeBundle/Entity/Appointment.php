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

    const COLOR_SUCCESS      = '#7CB280';
    const COLOR_TEXT_SUCCESS = '#000000';
    const COLOR_CLOSE_REASON = '#ADFFFC';
    const COLOR_TEXT         = '#FFFFFF';
    const COLOR_CLOSE_REASON_TEXT = '#040B96';

    const COLOR_BOLD_BG     = '#FF001D';
    const COLOR_BOLD_TEXT   = '#FFFFFF';
    const COLOR_BOLD_BORDER = '#000000';

    const SUCCESS_TITLE     = 'Оформлен';
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
     * @ORM\Column(type="boolean")
     */
    private $bold = false;

    /**
     * constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime();
        $this->state   = self::STATE_NEW;
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
        $end = clone $this->dateTime;
        $end->modify('+'.$this->duration.' min');

        return $end;
    }
    /**
     * @return string
     */
    static public function clazz()
    {
        return get_class();
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

    public function getForwarder()
    {
        return $this->forwarder;
    }

    public function setForwarder($forwarder)
    {
        $this->forwarder = $forwarder;
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

    private function getNewStateBgColor()
    {
        if ($this->bold) {
            return self::COLOR_BOLD_BG;
        }
        return $this->getService()->getColor();
    }

    private function getNewStateBorderColor()
    {
        if ($this->bold) {
            return self::COLOR_BOLD_BORDER;
        }
        return $this->getService()->getColor();
    }

    private function getTextColor()
    {
        if ($this->state == self::STATE_CLOSE_REASON) {
            return self::COLOR_CLOSE_REASON_TEXT;
        }
        if ($this->state == self::STATE_SUCCESS) {
            return self::COLOR_TEXT_SUCCESS;
        }


        return self::COLOR_TEXT;
    }

    private function getBgColor()
    {
        //#FF001D
        $bgColor = '';
        switch ($this->state) {
            case self::STATE_NEW:
                $bgColor = $this->getNewStateBgColor();
                break;
            case self::STATE_SUCCESS:
                $bgColor = self::COLOR_SUCCESS;
                break;
            case self::STATE_CLOSE_REASON:
                $bgColor = self::COLOR_CLOSE_REASON;
                break;
        }

        return $bgColor;
    }

    private function getBorderColor()
    {
        $borderColor = '';
        switch ($this->state) {
            case self::STATE_NEW:
                $borderColor = $this->getNewStateBorderColor();
            break;
            case self::STATE_SUCCESS:
                $borderColor = self::COLOR_SUCCESS;
            break;
            case self::STATE_CLOSE_REASON:
                $borderColor = self::COLOR_CLOSE_REASON;
            break;
        }

        return $borderColor;
    }

    /**
     * @return Reason
     */
    public function getLastReason()
    {
        $appReason = $this->getAppointmentReasons()->last();
        if (null != $appReason) {
            return $appReason->getReason();
        }
        return null;
    }
    private function getTitle()
    {
        if (self::STATE_CLOSE_REASON == $this->state) {
            $reason = $this->getLastReason();
            if ($reason != null) {
                return $reason->getName();
            }
        }
        $title = $this->getService()->getShort();
        if (self::STATE_SUCCESS == $this->state) {
            $title .= " ".self::SUCCESS_TITLE;
        }
        if ($this->bold && ($this->state == self::STATE_NEW)) {
            $title .= " - ".$this->description;
        }
        return $title;
    }

    /**
     * @return array
     */
    public function getCalendarData()
    {
        $service = $this->getService();

        return [
            'id'              => $this->id,
            'title'           => $this->getTitle(),
            'start'           => $this->dateTime->format('c'),
            'end'             => $this->getEndDate()->format('c'),
            'backgroundColor' => $this->getBgColor(),
            'borderColor'     => $this->getBorderColor(),
            'textColor'       => $this->getTextColor(),
        ];
    }
}
<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class City
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="appointment_reasons")
 */
class AppointmentReason implements EntityInterface
{
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
     * @ORM\ManyToOne(targetEntity="Appointment", inversedBy="appointmentReasons")
     * @ORM\JoinColumn(name="appointment_id", referencedColumnName="id")
     */
    private $appointment;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Reason")
     * @ORM\JoinColumn(name="reason_id", referencedColumnName="id")
     */
    private $reason;

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
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return Application
     */
    public function getAppointment()
    {
        return $this->appointment;
    }

    /**
     * @param Application $appointment
     */
    public function setAppointment($appointment)
    {
        $this->appointment = $appointment;
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
     * @return Reason
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param Reason $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    static public function clazz()
    {
        return get_class();
    }
    
    /**
     * @return array
     */
    public function getData()
    {
        return [
            'id'            => $this->id,
            'userId'        => $this->getUser()->getId(),
            'created'       => $this->created,
            'reasonId'      => $this->getReason()->getId(),
            'appointmentId' => $this->getAppointment()->getId(),
        ];
    }
}
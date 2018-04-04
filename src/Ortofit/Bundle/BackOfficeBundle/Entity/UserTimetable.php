<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class BusinessCalendar
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="user_timetables")
 */
class UserTimetable implements EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Day of week
     * @ORM\Column(type="integer")
     */
    private $dow;

    /**
     * @ORM\ManyToOne(targetEntity="Office")
     * @ORM\JoinColumn(name="office_id", referencedColumnName="id")
     */
    private $office;

    /**
     * @ORM\Column(name="start_hour", type="integer")
     */
    private $startHour;

    /**
     * @ORM\Column(name="start_minute", type="integer")
     */
    private $startMinute;

    /**
     * @ORM\Column(name="end_hour", type="integer")
     */
    private $endHour;

    /**
     * @ORM\Column(name="end_minute", type="integer")
     */
    private $endMinute;

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
     * @return integer
     */
    public function getDow()
    {
        return $this->dow;
    }

    /**
     * @param integer $dow
     */
    public function setDow($dow)
    {
        $this->dow = $dow;
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
    public function getStartHour()
    {
        return $this->startHour;
    }

    /**
     * @param integer $startHour
     */
    public function setStartHour($startHour)
    {
        $this->startHour = $startHour;
    }

    /**
     * @return integer
     */
    public function getStartMinute()
    {
        return $this->startMinute;
    }

    /**
     * @param integer $startMinute
     */
    public function setStartMinute($startMinute)
    {
        $this->startMinute = $startMinute;
    }

    /**
     * @return integer
     */
    public function getEndHour()
    {
        return $this->endHour;
    }

    /**
     * @param integer $endHour
     */
    public function setEndHour($endHour)
    {
        $this->endHour = $endHour;
    }

    /**
     * @return integer
     */
    public function getEndMinute()
    {
        return $this->endMinute;
    }

    /**
     * @param integer $endMinute
     */
    public function setEndMinute($endMinute)
    {
        $this->endMinute = $endMinute;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

}
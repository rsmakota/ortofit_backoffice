<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ortofit\Bundle\BackOfficeBundle\Model\ScheduleInterface;

/**
 * Class Schedule
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity(repositoryClass="Ortofit\Bundle\BackOfficeBundle\ORM\ScheduleRepository")
 * @ORM\Table(name="schedule")
 */
class Schedule implements ScheduleInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $start;

    /**
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Office")
     * @ORM\JoinColumn(name="office_id", referencedColumnName="id")
     */
    private $office;

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
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;
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
     * @return string
     */
    private function getTitle()
    {
        return $this->getUser()->getName();
    }

    /**
     * @return string
     */
    private function getColor()
    {
        return '#222D32';
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
    public function getCalendarData()
    {
        return [
            'id'        => $this->id,
            'title'     => $this->getTitle(),
            'start'     => $this->getStart()->format('c'),
            'end'       => $this->getEnd()->format('c'),
            'color'     => '#222D32',
            'backgroundColor' => $this->getColor(),
            'borderColor'     => $this->getColor(),
        ];
    }
}
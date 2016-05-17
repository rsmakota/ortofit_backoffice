<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRange;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ServiceManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ScheduleManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Schedule::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'schedule_manager';
    }

    /**
     * @param ParameterBag $params
     *
     * @return object
     */
    public function create($params)
    {
        $entity = new Schedule();
        $entity->setUser($params->get('user'));
        $entity->setOffice($params->get('office'));
        $entity->setStart($params->get('startHour'));
        $entity->setEnd($params->get('endHour'));

        $this->persist($entity);

        return $entity;
    }

    /**
     * @param ParameterBag $params
     *
     * @return boolean
     */
    public function update($params)
    {
        $entity = $this->rGet($params->get('id'));
        $entity->setUser($params->get('user'));
        $entity->setOffice($params->get('office'));
        $entity->setStart($params->get('startHour'));
        $entity->setEnd($params->get('endHour'));
        $this->merge($entity);

        return true;
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return Schedule[]
     */
    public function findByRange (DateRangeInterface $range, Office $office, User $user=null)
    {

        return $this->enManager->getRepository($this->getEntityClassName())->findByRange(
            $range,
            $office,
            $user
        );
    }

    /**
     * @param \DateTime $date
     * @param Office    $office
     * @param User      $user
     *
     * @return Schedule|null
     */
    public function findOneByDate($date, $office, $user)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findOneByDate(
            $date,
            $office,
            $user
        );
    }

    /**
     * @param \DateTime $date
     * @param Office    $office
     * @param User      $user
     *
     * @return Schedule[]|null
     */
    public function findByDate($date, $office, $user)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findByDate(
            $date,
            $office,
            $user
        );
    }

    /**
     * @param \DateTime     $dateTime
     * @param Appointment[] $apps
     *
     * @return bool
     */
    private function hasApp($dateTime, $apps)
    {
        if ($apps == null) {
            return false;
        }
        foreach ($apps as $app) {
            if ($dateTime->format('Y-m-d H:i') == $app->getDateTime()->format('Y-m-d H:i')) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Schedule[]    $schedules
     * @param Appointment[] $apps
     * @param string        $duration
     * @param string        $format
     *
     * @return array
     */
    public function getAllowTimesInFormat($schedules, $apps, $duration='+30 min', $format='H:i')
    {
        $hours = [];
        foreach ($schedules as $schedule) {
            $start = clone $schedule->getStart();
            while ($start < $schedule->getEnd()) {
                if (!$this->hasApp($start, $apps)) {
                    $hours[] = $start->format('H:i');
                }
                $start->modify($duration);
            }
        }

        return $hours;
    }

    /**
     * @param User   $doctor
     * @param Office $office
     * @param string $duration
     * @param string $format
     *
     * @return array
     */
    public function getAllowDatesInFormat($doctor, $office, $duration = '+1 month', $format = 'd/m/Y')
    {
        $dates     = [];
        $range     = new DateRange(new \DateTime(), new \DateTime($duration));
        $schedules = $this->findByRange($range, $office, $doctor);
        foreach ($schedules as $schedule) {
            $dates[$schedule->getStart()->format('Y-m-d')] = $schedule->getStart()->format($format);
        }

        return $dates;
    }

}
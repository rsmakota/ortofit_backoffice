<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventService;

use Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder\DefaultOffHoursEventBuilder;
use Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder\OffHoursEventBuilder;
use Ortofit\Bundle\BackOfficeAPIBundle\EventModel\CalendarEventInterface;
use Ortofit\Bundle\BackOfficeAPIBundle\Grid\ScheduleGrid;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Class OffHoursEventFactory
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Factory
 */
class EventService
{
    /**
     * @var ScheduleManager
     */
    private $scheduleManager;
    /**
     * @var OffHoursEventBuilder
     */
    private $offHoursBuilder;
    /**
     * @var DefaultOffHoursEventBuilder
     */
    private $defaultOffHoursBuilder;
//    /**
//     * @var array
//     */
//    private $defaultOffHoursData;


    private function createScheduleGrid($range, $schedules)
    {
        return new ScheduleGrid($range, $schedules);
    }

//    /**
//     * @param integer $officeId
//     *
//     * @return GridInterface
//     */
//    private function getDefaultGrid($officeId)
//    {
//
//        return new DefaultGrid($this->defaultOffHoursData[$officeId]);
//    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return CalendarEventInterface[]
     */
    private function createOffEvents($range, $office, $user = null)
    {
        $schedules = $this->scheduleManager->findByRange($range, $office, $user);
        $sortedSchedules = [];
        $count = count($schedules);
        for($i = 0; $i < $count; $i++) {
            $schedule = $schedules[$i];
            $j = $i+1;
            while (($j < $count) && ($schedule->getEnd()->getTimestamp() >= $schedules[$j]->getStart()->getTimestamp())) {
                if ($schedule->getEnd()->getTimestamp() <= $schedules[$j]->getEnd()->getTimestamp()) {
                    $schedule->setEnd($schedules[$j]->getEnd());
                }
                $j++;
            }
            $i = $j - 1;
            $sortedSchedules[] = $schedule;
        }

        $grid = $this->createScheduleGrid($range, $sortedSchedules);

        return $this->offHoursBuilder->create($grid);

    }

//    /**
//     * @param Office $office
//     *
//     * @return CalendarEventInterface[]
//     */
//    private function createDefaultEvents($office)
//    {
//        $grid = $this->getDefaultGrid($office->getId());
//
//        return $this->defaultOffHoursBuilder->create($grid);
//    }

    /**
     * EventService constructor.
     *
     * @param ScheduleManager             $scheduleManager
     * @param OffHoursEventBuilder        $offHoursBuilder
     * @param DefaultOffHoursEventBuilder $defaultOffHoursBuilder
     */
    public function __construct(
        ScheduleManager $scheduleManager,
        OffHoursEventBuilder $offHoursBuilder,
        DefaultOffHoursEventBuilder $defaultOffHoursBuilder
    ) {
        $this->scheduleManager        = $scheduleManager;
        $this->offHoursBuilder        = $offHoursBuilder;
        $this->defaultOffHoursBuilder = $defaultOffHoursBuilder;
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User|null       $user
     *
     * @return CalendarEventInterface[]
     */
    public function createOffHoursEvents($range, $office, $user = null)
    {
//        if (null == $user) {
//            return $this->createDefaultEvents($office);
//        }

        return $this->createOffEvents($range, $office, $user);
    }

//    /**
//     * @param array $defaultOffHoursData
//     */
//    public function setDefaultOffHoursData($defaultOffHoursData)
//    {
//        $this->defaultOffHoursData = $defaultOffHoursData;
//    }

}
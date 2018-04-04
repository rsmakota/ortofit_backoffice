<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder;

use Ortofit\Bundle\BackOfficeAPIBundle\Grid\GridInterface;
use Ortofit\Bundle\BackOfficeAPIBundle\EventModel\DateBackgroundEvent;
use Ortofit\Bundle\BackOfficeAPIBundle\EventModel\CalendarEventInterface;
use Ortofit\Bundle\BackOfficeBundle\Model\ScheduleInterface;

/**
 * Class ScheduleOverlap
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Service
 */
class OffHoursEventBuilder implements EventBuilderInterface
{
    /**
     * @var string
     */
    private $color;

    /**
     * BackgroundEventBuilder constructor.
     *
     * @param string $color
     */
    public function __construct($color)
    {
        $this->color = $color;
    }

    /**
     * @param GridInterface $grid
     *
     * @return CalendarEventInterface[]
     */
    public function create($grid)
    {
        $schedules = $grid->getArray();
        $events    = [];
        /** @var ScheduleInterface[] $schedule */
        foreach ($schedules as $date => $daySchedule) {
            $events = array_merge($events, $this->createOffHoursEvents($daySchedule, $date));
        }

        return $events;
    }

    /**
     * @param ScheduleInterface[] $daySchedule
     * @param string              $date
     *
     * @return CalendarEventInterface[]
     */
    private function createOffHoursEvents($daySchedule, $date)
    {
        $start  = new \DateTime($date." 00:00:00");
        $events = [];
        foreach($daySchedule as $schedule) {
            $end      = clone $schedule->getStart();
            $events[] = $this->createBackgroundEvent($start, $end);
            $start    = clone $schedule->getEnd();
        }
        $end      = new \DateTime($date." 23:59:59");
        $events[] = $this->createBackgroundEvent($start, $end);

        return $events;
    }

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     *
     * @return DateBackgroundEvent
     */
    private function createBackgroundEvent($start, $end)
    {
        return new DateBackgroundEvent($start->format('c'), $end->format('c'), $this->color);
    }
}
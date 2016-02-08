<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder;

use Ortofit\Bundle\BackOfficeAPIBundle\Grid\GridInterface;
use Ortofit\Bundle\BackOfficeAPIBundle\Model\CalendarEventInterface;
use Ortofit\Bundle\BackOfficeBundle\Model\ScheduleInterface;

/**
 * Class ScheduleOverlap
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Service
 */
class BackgroundEventBuilder
{
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
    public function create(GridInterface $grid)
    {
        $schedules = $grid->getArray();
        $events = [];
        /** @var ScheduleInterface[] $schedule */
        foreach ($schedules as $daySchedule) {
            $events = array_merge($events, $this->createEvents($daySchedule));
        }
    }

    /**
     * @param ScheduleInterface[] $daySchedule
     *
     * @return CalendarEventInterface[]
     */
    private function createEvents($daySchedule)
    {
        foreach($daySchedule as $schedule) {
            //TODO: Needs realisation there
        }
    }
}
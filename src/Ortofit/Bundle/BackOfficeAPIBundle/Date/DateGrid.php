<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Date;

use Ortofit\Bundle\BackOfficeAPIBundle\Model\CalendarEventInterface;
use Rsmakota\UtilityBundle\Date\DateRange;

/**
 * Class DateGrid
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Date
 */
class DateGrid
{
    private $grid   = [];
    private $format = 'Y-m-d';
    private $notWorhSchedule;
    /**
     * DateGrid constructor.
     *
     * @param DateRange $range
     */
    public function __construct(DateRange $range)
    {
        $iterator = $range->getDayIterator();

        while ($date = $iterator->next()) {
            $this->grid[$date->format($this->format)] = [];
        }
    }

    /**
     * @param CalendarEventInterface $event
     */
    public function addEvent(CalendarEventInterface $event)
    {
        $this->grid[$event->getStart()->format($this->format)][] = $event;
    }

    public function createNotWorkSchedule()
    {
        $scedule = [];
        foreach ($this->grid as $events)
        {
            $daySchedule = $this->createDaySchedule($events);
        }
    }

    private function createDaySchedule(array $events)
    {
        $notWorkEvents = [];
        $length = (count($events)-1);
        /** @var CalendarEventInterface $event */
        for ($i=0; $i<=$length; $i++) {
            $end = $events[$i]->getStart();
            $start = null;
            if ($i<$length) {
                $end = $events[($i+1)]->getStart();
            }
            $notWorkEvents[] = $this->createNotWorkEvent($start, $end);
        }
    }

    private function createNotWorkEvent(\DateTime $start, \DateTime $end)
    {

    }

}
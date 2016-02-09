<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Grid;

use Ortofit\Bundle\BackOfficeBundle\Model\ScheduleInterface;
use Rsmakota\UtilityBundle\Date\DateRange;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Class DateGrid
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Date
 */
class ScheduleGrid implements GridInterface
{
    private $grid   = [];
    private $format = 'Y-m-d';

    /**
     * DateGrid constructor.
     *
     * @param DateRangeInterface $range
     * @param array              $schedules
     */
    public function __construct(DateRangeInterface $range, $schedules = [])
    {
        $iterator = $range->getDayIterator();
        while ($date = $iterator->next()) {
            $this->grid[$date->format($this->format)] = [];
        }

        foreach ($schedules as $schedule) {
            $this->addItem($schedule);
        }
    }

    /**
     * @param ScheduleInterface $item
     */
    public function addItem($item)
    {
        $this->grid[$item->getStart()->format($this->format)][] = $item;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->grid;
    }

}
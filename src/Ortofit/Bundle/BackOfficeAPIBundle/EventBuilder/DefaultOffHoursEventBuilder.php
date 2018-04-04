<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder;

use Ortofit\Bundle\BackOfficeAPIBundle\EventModel\DayBackgroundEvent;
use Ortofit\Bundle\BackOfficeAPIBundle\Grid\GridInterface;
use Ortofit\Bundle\BackOfficeAPIBundle\EventModel\CalendarEventInterface;

/**
 * Class DefaultOffHoursEventBuilder
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder
 */
class DefaultOffHoursEventBuilder implements EventBuilderInterface
{
    private $color;

    /**
     * DefaultOffHoursEventBuilder constructor.
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
        $events = [];
        $items = $grid->getArray();
        foreach ($items as $item) {
            $events[] = new DayBackgroundEvent($item['start'], $item['end'], $this->color, $item['dow']);
        }

        return $events;
    }
}
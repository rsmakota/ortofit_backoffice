<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventModel;

/**
 * Class DayBackgroundEvent
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Model
 */
class DayBackgroundEvent extends DateBackgroundEvent
{
    private $dow = [];

    /**
     * DayBackgroundEvent constructor.
     *
     * @param string $start
     * @param string $end
     * @param string $color
     * @param array  $dow
     */
    public function __construct($start, $end, $color, array $dow)
    {
        $this->dow = $dow;
        parent::__construct($start, $end, $color);
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();
        $data['dow'] = $this->dow;

        return $data;
    }
}
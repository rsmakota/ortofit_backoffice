<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventModel;

/**
 * Class BackgroundEvent
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model
 */
class DateBackgroundEvent implements CalendarEventInterface
{
    protected $start;
    protected $end;
    protected $color;
    protected $rendering = 'background';
    protected $overlap   = true;

    /**
     * BackgroundEvent constructor.
     * @param string $start
     * @param string $end
     * @param string $color
     */
    public function __construct($start, $end, $color)
    {
        $this->start = $start;
        $this->end   = $end;
        $this->color = $color;
    }


    /**
     * @return array
     */
    public function getData()
    {
        return [
            'id'        => 'available_hours',
            'start'     => $this->start,
            'end'       => $this->end,
            'color'     => $this->color,
//            'overlap'   => $this->overlap,
            'rendering' => $this->rendering,
        ];
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        $this->color;
    }

    /**
     * @return boolean
     */
    public function getOverlap()
    {
        $this->overlap;
    }

    /**
     * @return string
     */
    public function getRendering()
    {
        return $this->rendering;
    }
}
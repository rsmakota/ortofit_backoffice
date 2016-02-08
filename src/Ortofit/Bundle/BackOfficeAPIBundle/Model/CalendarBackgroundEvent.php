<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Model;

/**
 * Class BackgroundEvent
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model
 */
class CalendarBackgroundEvent implements CalendarEventInterface
{
    private $id;
    private $start;
    private $end;
    private $color;
    private $rendering = 'background';
    private $overlap   = true;

    /**
     * BackgroundEvent constructor.
     * @param string $id
     * @param string $start
     * @param string $end
     * @param string $color
     */
    public function __construct($id, $start, $end, $color)
    {
        $this->id    = $id;
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
            'id'        => $this->id,
            'start'     => $this->start,
            'end'       => $this->end,
            'color'     => $this->color,
            'overlap'   => $this->overlap,
            'rendering' => $this->rendering,
        ];
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return \DateTime
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
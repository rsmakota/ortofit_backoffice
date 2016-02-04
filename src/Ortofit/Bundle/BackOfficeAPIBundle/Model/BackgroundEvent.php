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
class BackgroundEvent implements CalendarEventInterface
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
     */
    public function __construct($id, $start, $end)
    {
        $this->id    = $id;
        $this->start = $start;
        $this->end   = $end;
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
}
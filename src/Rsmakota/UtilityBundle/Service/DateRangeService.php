<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Rsmakota\UtilityBundle\Service;


use Rsmakota\UtilityBundle\Date\DateRange;

class DateRangeService
{
    /**
     * @return DateRange
     */
    public function getYearRange()
    {
        $end   = new \DateTime();
        $start = new \DateTime(($end->format('Y')-1).'-'.$end->format('m')."-01 00:00:00");
        
        return new DateRange($start, $end);
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     *
     * @return DateRange
     */
    public function createRange($from, $to)
    {
        return new DateRange($from, $to);
    }

    /**
     * @param \DateTime $from
     *
     * @return DateRange
     */
    public function createMonthRange($from)
    {
        $end = clone $from;
        $end->modify('+1 month');

        return $this->createRange($from, $end);
    }
}
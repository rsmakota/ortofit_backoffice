<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Rsmakota\UtilityBundle\Service;


use Rsmakota\UtilityBundle\Date\DateRange;

class DateRangeService implements DateRangeServiceInterface
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
     * @param \DateTime|string $from
     * @param \DateTime|string $to
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

    /**
     * @param \DateTime $from
     * @param string    $period
     *
     * @return DateRange
     * @throws \Exception
     */
    public function createPeriodRange($from, $period)
    {
        $method = 'create'.ucfirst($period).'Range';
        if (method_exists($this, $method)) {
            return $this->$method($from);
        }
        
        throw new \Exception(sprintf('Method %s doesn\' exist'));
    }
}
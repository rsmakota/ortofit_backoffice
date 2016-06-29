<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Rsmakota\UtilityBundle\Date;

/**
 * Class DateRange
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Date
 */
class DateRange implements DateRangeInterface
{
    const PERIOD_DAY   = 'day';
    const PERIOD_YEAR  = 'year';
    const PERIOD_MONTH = 'month';
    
    /**
     * @var \DateTime
     */
    protected $from;
    /**
     * @var \DateTime
     */
    protected $to;

    /**
     * DateRange constructor.
     * @param \DateTime|string $from
     * @param \DateTime|string $to
     */
    public function __construct($from, $to)
    {
        $this->from = $this->toDateTime($from);
        $this->to   = $this->toDateTime($to);
    }

    /**
     * @param \DateTime|string $date
     *
     * @return \DateTime
     */
    private function toDateTime($date)
    {
        if ($date instanceof \DateTime) {
            return clone $date;
        }

        return new \DateTime($date);
    }

    /**
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $type
     *
     * @return RangeIteratorInterface
     * @throws \Exception
     */
    public function getIterator($type)
    {
        $method = 'get'.ucfirst($type).'Iterator';
        if (!method_exists($this, $method)) {
            throw new \Exception(sprintf('Method %s does\'t exist', $method));
        }

        return $this->$method();
    }
    /**
     * @return RangeIteratorInterface
     */
    public function getDayIterator()
    {
        return new DayIterator($this->from, $this->to);
    }

    /**
     * @return MonthIterator
     */
    public function getMonthIterator()
    {
        return new MonthIterator($this->from, $this->to);
    }
}
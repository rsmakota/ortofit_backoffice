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
    /**
     * @var \DateTime
     */
    protected $from;
    /**
     * @var \DateTime
     */
    protected $to;
    /**
     * @var DateIteratorInterface
     */
    protected $dayIterator;

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
            return $date;
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
     * @return DateIteratorInterface
     */
    public function getDayIterator()
    {
        if (!$this->dayIterator) {
            $this->dayIterator = new DayIterator($this->from, $this->to);
        }

        return $this->dayIterator;
    }
}
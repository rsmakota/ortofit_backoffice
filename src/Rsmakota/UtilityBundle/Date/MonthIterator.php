<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Rsmakota\UtilityBundle\Date;

/**
 * Class DayIterator
 *
 * @package Rsmakota\UtilityBundle\Date
 */
class MonthIterator implements RangeIteratorInterface
{
    /**
     * @var \DateTime
     */
    private $start;
    /**
     * @var \DateTime
     */
    private $end;
    /**
     * @var \DateTime|null
     */
    private $current;
    /**
     * DayIterator constructor.
     *
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    /**
     * @return \DateTime|false
     */
    public function next()
    {
        if (null == $this->current) {
            return $this->current = clone $this->start;
        }

        if ($this->current->format('U') < $this->end->format('U')) {
            return $this->current->modify('+1 month');
        }

        return false;
    }

    /**
     * @return \DateTime|false
     */
    public function previous()
    {
        if ($this->current->format('U') > $this->start->format('U')) {
            return $this->current->modify('-1 month');
        }

        return false;
    }

    /**
     * @return \DateTime
     */
    public function current()
    {
        return $this->current();
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->current = null;
    }
}
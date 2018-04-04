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
        $this->start = clone $start;
        $this->end   = clone $end;
    }

    /**
     * @return \DateTime|false
     */
    public function next()
    {
        if (null == $this->current) {
            $this->current = clone $this->start;

            return clone $this->current;
        }

        if ($this->current->format('Ym') < $this->end->format('Ym')) {
            return clone $this->current->modify('+1 month');
        }

        return false;
    }

    /**
     * @return \DateTime|false
     */
    public function previous()
    {
        if ($this->current->format('U') > $this->start->format('U')) {
            return clone $this->current->modify('-1 month');
        }

        return false;
    }

    /**
     * @return \DateTime
     */
    public function current()
    {
        return clone $this->current();
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->current = null;
    }
}
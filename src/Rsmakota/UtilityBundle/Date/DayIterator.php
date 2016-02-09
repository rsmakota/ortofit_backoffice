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
class DayIterator implements DateIteratorInterface
{
    private $start;
    private $end;
    private $current;
    private $step = 86400;
    /**
     * DayIterator constructor.
     *
     * @param \DateTime $start
     * @param \DateTime $end
     */
    public function __construct(\DateTime $start, \DateTime $end)
    {
        $this->start   = $start;
        $this->end     = $end;
    }

    /**
     * @return \DateTime|false
     */
    public function next()
    {
        if (null == $this->current) {
            return $this->current = clone $this->start;
        }

        if (($this->current->format('U') + $this->step) > $this->end->format('U')) {
            return false;
        }

        return $this->current->modify('+1 day');
    }

    /**
     * @return \DateTime|false
     */
    public function previous()
    {
        if (($this->current->format('U') - $this->step) > $this->start->format('U')) {
            return false;
        }

        return $this->current->modify('-1 day');
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
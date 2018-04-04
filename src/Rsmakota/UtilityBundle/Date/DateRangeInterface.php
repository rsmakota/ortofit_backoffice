<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Rsmakota\UtilityBundle\Date;

/**
 * Interface DateRangeInterface
 *
 * @package Rsmakota\UtilityBundle\Date
 */
interface DateRangeInterface
{
    /**
     * @return \DateTime
     */
    public function getFrom();

    /**
     * @return \DateTime
     */
    public function getTo();

    /**
     * @return RangeIteratorInterface
     */
    public function getDayIterator();

    /**
     * @param string $type
     *
     * @return RangeIteratorInterface
     */
    public function getIterator($type);
    /**
     * @return MonthIterator
     */
    public function getMonthIterator();
}
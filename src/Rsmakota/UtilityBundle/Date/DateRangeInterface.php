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
     * @return DateIteratorInterface
     */
    public function getDayIterator();
}
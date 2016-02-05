<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Rsmakota\UtilityBundle\Date;

/**
 * Interface DayIteratorInterface
 *
 * @package Rsmakota\UtilityBundle\Date
 */
interface DateIteratorInterface
{
    /**
     * @return \DateTime
     */
    public function next();

    /**
     * @return \DateTime
     */
    public function previous();

    /**
     * @return \DateTime
     */
    public function current();

    /**
     * @return void
     */
    public function rewind();

}
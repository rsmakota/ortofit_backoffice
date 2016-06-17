<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Rsmakota\UtilityBundle\Date;

/**
 * Interface RangeIteratorInterface
 *
 * @package Rsmakota\UtilityBundle\Date
 */
interface RangeIteratorInterface
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
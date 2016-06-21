<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Interface IndicatorInterface
 * @package Ortofit\Bundle\StatBundle
 */
interface IndicatorInterface
{
    /**
     * @param DateRangeInterface $range
     * @param string             $period
     *
     * @return array
     */
    public function calculate(DateRangeInterface $range, $period);
}
<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Rsmakota\UtilityBundle\Service;

use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Interface DateRangeServiceInterface
 * @package Rsmakota\UtilityBundle\Service
 */
interface DateRangeServiceInterface
{
    /**
     * @param \DateTime|string $from
     * @param \DateTime|string $to
     *
     * @return DateRangeInterface
     */
    public function createRange($from, $to);
}
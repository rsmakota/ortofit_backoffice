<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Service;

use Ortofit\Bundle\StatBundle\Indicator\IndicatorInterface;

/**
 * Interface IndicatorServiceInterface
 * @package Ortofit\Bundle\StatBundle\Service
 */
interface IndicatorServiceInterface
{
    /**
     * @param $indicatorId
     *
     * @return IndicatorInterface
     */
    public function get($indicatorId);

    /**
     * @param IndicatorInterface $indicator
     *
     */
    public function add($indicator);
}
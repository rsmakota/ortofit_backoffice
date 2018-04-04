<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Service;

use Ortofit\Bundle\StatBundle\Indicator\IndicatorInterface;

/**
 * Class IndicatorService
 *
 * @package Ortofit\Bundle\StatBundle\Service
 */
class IndicatorService implements IndicatorServiceInterface
{
    /**
     * @var IndicatorInterface[]
     */
    private $indicators = [];

    /**
     * @param IndicatorInterface $indicator
     */
    public function add($indicator) {
        $this->indicators[$indicator->getId()] = $indicator;
    }
    
    /**
     * @param string $indicatorId
     *
     * @return IndicatorInterface
     */
    public function get($indicatorId)
    {
        return $this->indicators[$indicatorId];
    }
}
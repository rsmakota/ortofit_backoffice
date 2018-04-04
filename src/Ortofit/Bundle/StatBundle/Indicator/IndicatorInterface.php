<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Ortofit\Bundle\StatBundle\Request\StatRequestInterface;

/**
 * Interface IndicatorInterface
 * @package Ortofit\Bundle\StatBundle
 */
interface IndicatorInterface
{
    /**
     * @param StatRequestInterface $request
     *
     * @return array
     */
    public function calculate($request);

    /**
     * @return string
     */
    public function getId();
}
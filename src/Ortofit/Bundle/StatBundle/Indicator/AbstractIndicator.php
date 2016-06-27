<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Ortofit\Bundle\StatBundle\Request\StatRequestInterface;

/**
 * Class AbstractIndicator
 *
 * @package Ortofit\Bundle\StatBundle\Indicator
 */
abstract class AbstractIndicator implements IndicatorInterface
{
    /**
     * @return string
     */
    abstract public function getId();
    /**
     * @param StatRequestInterface $request
     *
     * @return array
     */
    abstract public function calculate($request);
}
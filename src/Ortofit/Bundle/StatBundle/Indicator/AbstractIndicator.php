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
    const PARAM_NAME_DATA    = 'data';
    const PARAM_NAME_DATE    = 'date';
    const PARAM_NAME_VALUE   = 'value';
    const PARAM_LINE_NAME    = 'line_name';
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
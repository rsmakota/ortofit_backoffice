<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */
namespace Ortofit\Bundle\StatBundle\Request;

use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface StatRequestInterface
 * 
 * @package Ortofit\Bundle\StatBundle\Request
 */
interface StatRequestInterface
{
    /**
     * @return DateRangeInterface
     */
    public function getRange();

    /**
     * @return string
     */
    public function getPeriodType();

    /**
     * @return ParameterBag
     */
    public function getParams();
}
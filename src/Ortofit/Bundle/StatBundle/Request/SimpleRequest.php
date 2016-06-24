<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\StatBundle\Request;

use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class SimpleRequest
 *
 * @package Ortofit\Bundle\StatBundle\Request
 */
class SimpleRequest implements StatRequestInterface
{
    /** @var  DateRangeInterface */
    protected $range;
    
    /** @var  string */
    protected $periodType;
    
    /** @var  array */
    protected $params;

    /**
     * SimpleRequest constructor.
     *
     * @param DateRangeInterface $range
     * @param string             $periodType
     * @param array              $params
     */
    public function __construct(DateRangeInterface $range, $periodType, array $params)
    {
        $this->range      = $range;
        $this->params     = $params;
        $this->periodType = $periodType;
    }

    /**
     * @return DateRangeInterface
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @return string
     */
    public function getPeriodType()
    {
        return $this->periodType;
    }

    /**
     * @return ParameterBag
     */
    public function getParams()
    {
        return $this->params;
    }
}
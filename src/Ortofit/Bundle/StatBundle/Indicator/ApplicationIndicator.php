<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\EntityManagerInterface;
use Ortofit\Bundle\StatBundle\Request\StatRequestInterface;
use Rsmakota\UtilityBundle\Date\DateRange;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Rsmakota\UtilityBundle\Service\DateRangeService;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ApplicationIndicator
 *
 * @package Ortofit\Bundle\StatBundle\Indicator
 */
class ApplicationIndicator implements IndicatorInterface
{
    const PARAM_NAME_OFFICES = 'offices';

    /**
     * @var EntityManagerInterface
     */
    private $appManager;

    /**
     * @var  DateRange
     */
    private $rangeService;

    /**
     * ApplicationIndicator constructor.
     *
     * @param AppointmentManager $appManager
     * @param DateRangeService   $rangeService
     */
    public function __construct($appManager, $rangeService)
    {
        $this->appManager   = $appManager;
        $this->rangeService = $rangeService;
    }

    /**
     * @param DateRangeInterface $range
     * @param Office|null        $office
     * 
     * @return integer
     */
    private function count($range, $office = null)
    {
        return $this->appManager->countByRange($range, $office, null);
    }

    /**
     * @param DateRangeInterface $range
     * @param string             $period
     * @param Office[]|null      $offices
     * 
     * @return array
     */
    private function getAllData($range, $period, $offices = null)
    {
        if (null == $offices) {
            return [$this->getData($range, $period)];
        }
        
        $items = [];
        foreach ($offices as $office) {
            $items[] = $this->getData($range, $period, $office);
        }
        
        return $items;
    }
    
    /**
     * @param DateRangeInterface $range
     * @param string             $period
     * @param Office|null        $office
     * 
     * @return array
     */
    private function getData($range, $period, $office = null)
    {
        $items    = [];
        $iterator = $range->getIterator($period);
        while ($date = $iterator->next()) {
            $item          = [];
            $periodRange   = $this->rangeService->createPeriodRange($date, $period);
            $item['date']  = $date;
            $item['value'] = $this->count($periodRange, $office);
            $items[]       = $item;
        }
        
        return ['data' => $items, 'office' => $office];
    }
    
    /**
     * @param StatRequestInterface $request
     *
     * @return array
     */
    public function calculate($request)
    {
        $range    = $request->getRange();
        $params   = $request->getParams();
        $offices  = $params->get(self::PARAM_NAME_OFFICES);

        return $this->getAllData($range, $request->getPeriodType(), $offices);
        
    }
}
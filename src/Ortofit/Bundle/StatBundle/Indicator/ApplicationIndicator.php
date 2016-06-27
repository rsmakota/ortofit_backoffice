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

/**
 * Class ApplicationIndicator
 *
 * @package Ortofit\Bundle\StatBundle\Indicator
 */
class ApplicationIndicator extends AbstractIndicator
{
    const PARAM_NAME_OFFICES = 'offices';
    const PARAM_NAME_OFFICE  = 'office';
    const PARAM_NAME_DATA    = 'data';
    const PARAM_NAME_DATE    = 'date';
    const PARAM_NAME_VALUE   = 'value';

    
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
     * @param string  $key
     * @param integer $value
     *
     * @return array
     */
    private function createItem($key, $value)
    {
        return [
            self::PARAM_NAME_DATE  => $key,
            self::PARAM_NAME_VALUE => $value
        ];
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
            $pRange  = $this->rangeService->createPeriodRange($date, $period);
            $items[] = $this->createItem($date, $this->count($pRange, $office));
        }
        
        return [
            self::PARAM_NAME_DATA   => $items, 
            self::PARAM_NAME_OFFICE => $office
        ];
    }
    
    /**
     * @param StatRequestInterface $request
     *
     * @return array
     */
    public function calculate($request)
    {
        $range   = $request->getRange();
        $params  = $request->getParams();
        $offices = $params->get(self::PARAM_NAME_OFFICES);

        return $this->getAllData($range, $request->getPeriodType(), $offices);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'application_indicator';
    }
}
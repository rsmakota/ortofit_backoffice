<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\EntityManagerInterface;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager;
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
    const PARAM_NAME_OFFICE  = 'office';
    
    /**
     * @var EntityManagerInterface
     */
    private $appManager;
    /**
     * @var EntityManagerInterface
     */
    private $officeManager;

    /**
     * @var  DateRange
     */
    private $rangeService;

    /**
     * ApplicationIndicator constructor.
     *
     * @param AppointmentManager $appManager
     * @param OfficeManager      $officeManager
     * @param DateRangeService   $rangeService
     */
    public function __construct($appManager, $officeManager, $rangeService)
    {
        $this->appManager    = $appManager;
        $this->officeManager = $officeManager;
        $this->rangeService  = $rangeService;
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
     * @param \DateTime $date
     * @param integer   $value
     *
     * @return array
     */
    private function createItem($date, $value)
    {
        return [
            self::PARAM_NAME_DATE  => $date,
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
            self::PARAM_NAME_DATA => $items, 
            self::PARAM_LINE_NAME => $office->getName()
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
        $office = $params->get(self::PARAM_NAME_OFFICE);
        if ($office == null) {
            $offices = $this->officeManager->all();

            return $this->getAllData($range, $request->getPeriodType(), $offices);
        }

        return $this->getData($range, $request->getPeriodType());
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'application_indicator';
    }
}
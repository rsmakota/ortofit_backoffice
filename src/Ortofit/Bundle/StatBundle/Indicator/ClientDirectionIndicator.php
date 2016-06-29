<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Indicator;

use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientDirectionManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientManager;
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
class ClientDirectionIndicator extends AbstractIndicator
{
    /**
     * @var EntityManagerInterface
     */
    private $directionManager;
    /**
     * @var EntityManagerInterface
     */
    private $clientManager;

    /**
     * @var  DateRange
     */
    private $rangeService;

    /**
     * ApplicationIndicator constructor.
     *
     * @param ClientDirectionManager $clientDirectionManager
     * @param ClientManager          $clientManager
     * @param DateRangeService       $rangeService
     */
    public function __construct($clientDirectionManager, $clientManager, $rangeService)
    {
        $this->directionManager = $clientDirectionManager;
        $this->clientManager    = $clientManager;
        $this->rangeService     = $rangeService;
    }

    /**
     * @param DateRangeInterface $range
     * @param ClientDirection    $direction
     * 
     * @return integer
     */
    private function count($range, $direction)
    {
        return $this->clientManager->countNewByDirection($range, $direction);
    }

    /**
     * @param DateRangeInterface $range
     * @param string             $period
     * @param ClientDirection    $directions
     * 
     * @return array
     */
    private function getAllData($range, $period, $directions)
    {
        $items = [];
        foreach ($directions as $direction) {
            $items[] = $this->getData($range, $period, $direction);
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
     * @param ClientDirection    $direction
     * 
     * @return array
     */
    private function getData($range, $period, $direction = null)
    {
        $items    = [];
        $iterator = $range->getIterator($period);
        while ($date = $iterator->next()) {
            $pRange  = $this->rangeService->createPeriodRange($date, $period);
            $items[] = $this->createItem($date, $this->count($pRange, $direction));
        }

        return [
            self::PARAM_NAME_DATA => $items, 
            self::PARAM_LINE_NAME => $direction->getName()
        ];
    }
    
    /**
     * @param StatRequestInterface $request
     *
     * @return array
     */
    public function calculate($request)
    {
        $range      = $request->getRange();
        $directions = $this->directionManager->all();

        return $this->getAllData($range, $request->getPeriodType(), $directions);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'client_direction_indicator';
    }
}
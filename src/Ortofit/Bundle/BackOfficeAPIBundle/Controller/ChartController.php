<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Rsmakota\UtilityBundle\Date\DateRange;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ChartController extends BaseController
{

    const PARAMETER_PERIOD     = 'period';
    const PARAMETER_ID_TOTAL   = 'total';
    const PARAMETER_NAME_TOTAL = 'Всего';
    private function getRangeService()
    {
        return $this->get('rsmakota_utility.date_range_service');
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function appCountAction()
    {
        $range    = $this->getRangeService()->getYearRange();
        $iterator = $range->getIterator(DateRange::PERIOD_MONTH);
        $offices  = $this->getOfficeManager()->all();
        $data     = [];
        /** @var \DateTime $day */
        while ($day = $iterator->next()) {
            $item   = [self::PARAMETER_PERIOD => $day->format('Y-m')];
            $mRange = $this->getRangeService()->createMonthRange($day);
            /** @var Office $office */
            $sum = 0;
            foreach ($offices as $office) {
                $count = $this->getAppointmentManager()->countByRange($mRange, $office, null);
                $item[$office->getId()] = $count;
                $sum += $count;
            }
            $item[self::PARAMETER_ID_TOTAL] = $sum;
            $data[] = $item;
        }
        $yKeys = [];
        $yName = [];
        foreach ($offices as $office) {
            $yKeys[] = $office->getId();
            $yName[] = $office->getName();
        }
        $yKeys[] = self::PARAMETER_ID_TOTAL;
        $yName[] = self::PARAMETER_NAME_TOTAL;

        $result = ['xKey' => self::PARAMETER_PERIOD, 'yKeys'=>$yKeys, 'yName'=> $yName, 'data' => $data ];
        return $this->createSuccessJsonResponse($result);
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function directionAction()
    {
        $range      = $this->getRangeService()->getYearRange();
        $iterator   = $range->getIterator(DateRange::PERIOD_MONTH);
        $directions = $this->getClientDirectionManager()->all(); 
        $data       = [];
        /** @var \DateTime $day */
        while ($day = $iterator->next()) {
            $item   = [self::PARAMETER_PERIOD => $day->format('Y-m')];
            $mRange = $this->getRangeService()->createMonthRange($day);
            $sum = 0;
            foreach ($directions as $direction) {
                $count = $this->getClientManager()->countNewByDirection($mRange, $direction);
                $item[$direction->getId()] = $count;
                $sum += $count;
            }
            $item[self::PARAMETER_ID_TOTAL] = $sum;
            $data[] = $item;
        }
        $yKeys = [];
        $yName = [];
        foreach ($directions as $direction) {
            $yKeys[] = $direction->getId();
            $yName[] = $direction->getName();
        }
        $yKeys[] = self::PARAMETER_ID_TOTAL;
        $yName[] = self::PARAMETER_NAME_TOTAL;
        $result = ['xKey' => self::PARAMETER_PERIOD, 'yKeys'=>$yKeys, 'yName'=> $yName, 'data' => $data ];
        return $this->createSuccessJsonResponse($result);
    }
}
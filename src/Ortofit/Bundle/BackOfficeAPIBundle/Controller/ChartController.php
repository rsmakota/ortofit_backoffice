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

    const PARAMETER_PERIOD = 'period';
    
    private function getRangeService()
    {
        return $this->get('rsmakota_utility.date_range_service');
    }
    
    /**
     * @return JsonResponse
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
            foreach ($offices as $office) {
                $item[$office->getId()] = $this->getAppointmentManager()->countByRange($mRange, $office, null);
            }
            $data[] = $item;
        }
        $yKeys = [];
        $yName = [];
        foreach ($offices as $office) {
            $yKeys[] = $office->getId();
            $yName[] = $office->getName();
        }
        $result = ['xKey' => self::PARAMETER_PERIOD, 'yKeys'=>$yKeys, 'yName'=> $yName, 'data' => $data ];
        return $this->createSuccessJsonResponse($result);
    }
}
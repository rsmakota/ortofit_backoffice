<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\StatBundle\Request\SimpleRequest;
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

    private function getIndicatorService()
    {
        return $this->get('ortofit_stat.indicator_service');
    }

    /**
     * @return \Ortofit\Bundle\StatBundle\Service\StatRequestManager
     */
    private function getStatRequestManager()
    {
        return $this->get('ortofit_stat.request_manager');
    }

    /**
     * @return \Ortofit\Bundle\StatBundle\Request\StatRequestInterface
     */
    private function getStatRequest()
    {
        return $this->getStatRequestManager()->create();
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator\ChartResponseDecoratorService
     */
    private function getResponseDecorator()
    {
        return $this->get('backoffice_api.chart_response_decorator');
    }

    /**
     * @param string  $name    indicator name
     * @param string  $format  response format
     *
     * @return JsonResponse
     */
    public function indicatorAction($name, $format)
    {
        $indicator = $this->getIndicatorService()->get($name);
        $decorator = $this->getResponseDecorator()->get($format);
        $iRequest  = $this->getStatRequest();
        $data      = $indicator->calculate($iRequest);
        if ($decorator) {
            $data = $decorator->decorate($data);
        }

        return $this->createSuccessJsonResponse($data);
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
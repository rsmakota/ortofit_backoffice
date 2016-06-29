<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;


class ChartController extends BaseController
{
    /**
     * @return \Rsmakota\UtilityBundle\Service\DateRangeService
     */
    private function getDataRangeService()
    {
        return $this->get('rsmakota_utility.date_range_service');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $range = $this->getDataRangeService()->getYearRange();
        return $this->render(
            '@OrtofitBackOfficeFront/Chart/index.html.twig',
            [
                'from'       => $range->getFrom()->format('Y-m-d'),
                'to'         => $range->getTo()->format('Y-m-d'),
                'periodType' => 'month'
            ]);
    }
}
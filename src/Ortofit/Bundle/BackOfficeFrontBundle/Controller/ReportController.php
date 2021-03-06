<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\ModelProviderInterface;
use Rsmakota\UtilityBundle\Date\DateRange;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StaffScheduleController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class ReportController extends BaseController
{

    /**
     * Index page with calendar/schedule
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $offices        = $this->getOfficeManager()->all();
        $activeOfficeId = $offices[0]->getId();
        $doctors        = $this->getDoctors();
        $services       = $this->getServiceManager()->all();
        return $this->render(
            '@OrtofitBackOfficeFront/Report/index.html.twig',
            ['offices' => $offices, 'activeOfficeId' => $activeOfficeId, 'doctors' => $doctors , 'services' => $services]
        );
    }


    public function forwarderAction(Request $request)
    {
        return $this->render('@OrtofitBackOfficeFront/Report/forwarder.html.twig', []);
    }

}
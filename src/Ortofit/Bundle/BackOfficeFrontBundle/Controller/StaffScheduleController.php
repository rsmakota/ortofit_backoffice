<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\ModelProviderInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StaffScheduleController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class StaffScheduleController extends BaseController
{
    /**
     * @return ModelProviderInterface
     */
    private function getModelProvider()
    {
        return $this->get('bf.schedule_view_model_provider');
    }

    /**
     * Index page with calendar/schedule
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $offices        = $this->getOfficeManager()->all();
        $activeOfficeId = $offices[0]->getId();
        $doctors        = $this->getDoctors();

        return $this->render(
            '@OrtofitBackOfficeFront/StaffSchedule/index.html.twig',
            ['offices' => $offices, 'activeOfficeId' => $activeOfficeId, 'doctors' => $doctors]);
    }

    /**
     * Return a new book form or old for changing data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction()
    {
        $model = $this->getModelProvider()->getModel();

        return $this->render('@OrtofitBackOfficeFront/StaffSchedule/form.html.twig', ['model'=>$model, 'country'=>$this->getCountry()]);

    }

    /**
     * View book data
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewScheduleAction(Request $request)
    {
        /** @var Schedule $schedule */
        $schedule  = $this->getAppointmentManager()->get($request->get('id'));
        $data = [
            'schedule' => $schedule
        ];

        return $this->render('@OrtofitBackOfficeFront/StaffSchedule/viewSchedule.html.twig', $data);
    }
}
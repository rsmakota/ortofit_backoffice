<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppointmentController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class AppointmentController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager
     */
    private function getScheduleManager()
    {
        return $this->get('ortofit_back_office.schedule_manage');
    }
    
    /**
     * @return \Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider\AppointmentViewModelProvider
     */
    private function getModelProvider()
    {
        return $this->get('bf.app_view_model_provider');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\ReasonManager
     */
    private function getReasonsManager()
    {
        return $this->get('ortofit_back_office.reason_manage');
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
            '@OrtofitBackOfficeFront/Appointment/index.html.twig',
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

        return $this->render('@OrtofitBackOfficeFront/Appointment/form.html.twig', ['model'=>$model, 'country'=>$this->getCountry()]);
    }

    /**
     * View book data
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAppAction(Request $request)
    {
        /** @var Appointment $app */
        $app  = $this->getAppointmentManager()->get($request->get('appId'));
        $data = [
            'appointment' => $app
        ];

        return $this->render('@OrtofitBackOfficeFront/Appointment/viewApp.html.twig', $data);
    }

    /**
     * Return form for change book time or office
     * @param integer $appId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rescheduleAction($appId)
    {
        /** @var Appointment $app */
        $app        = $this->getAppointmentManager()->get($appId);
        $allowDates = $this->getScheduleManager()->getAllowDatesInFormat($app->getUser(),  $app->getOffice());
        $data = [
            'offices'         => $this->getOfficeManager()->all(),
            'dates'           => $allowDates,
            'times'           => [],
            'appId'           => $appId,
            'currentOfficeId' => $app->getOffice()->getId(),
            'currentDate'     => $app->getDateTime()->format('d/m/Y'),
            'currentTime'     => $app->getDateTime()->format('H:i'),
        ];

        return $this->render('@OrtofitBackOfficeFront/Appointment/reschedule.html.twig', $data);
    }

    /**
     * @param integer $appId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function closeReasonAction($appId)
    {
        $data = [
            'reasons' => $this->getReasonsManager()->all(),
            'appId'   => $appId
        ];

        return $this->render('@OrtofitBackOfficeFront/Appointment/closeReason.html.twig', $data);
    }

    
}
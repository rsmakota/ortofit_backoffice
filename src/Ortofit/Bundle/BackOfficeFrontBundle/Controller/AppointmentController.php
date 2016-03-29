<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
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
     * @return ArrayCollection
     */
    private function getDoctors()
    {
        $group = $this->get('fos_user.group_manager')->findGroupBy(['name' => 'Doctor']);

        return $group->getUsers();
    }

    /**
     * @return null|Country
     */
    private function getCountry()
    {
        return $this->getCountryManager()->getDefault();
    }

    /**
     * @param \DateTime $date
     * @param User      $user
     * @param Office    $office
     *
     * @return bool
     */
    private function isWorkDate($date, $user, $office)
    {
        $schedule = $this->getScheduleManager()->findOneByDate($date, $office, $user);
        if ($schedule) {
            return true;
        }

        return false;
    }

    private function getFormDataByAppId($appId)
    {
        /** @var Appointment $app */
        $app = $this->getAppointmentManager()->get($appId);
        return [
            'serviceId'   => $app->getService()->getId(),
            'msisdn'      => $app->getClient()->getLocalMsisdn(),
            'clientName'  => $app->getClient()->getName(),
            'directionId' => $app->getClient()->getClientDirection()->getId(),
            'office'      => $app->getOffice(),
            'date'        => $app->getDateTime()->format('d/m/Y'),
            'time'        => $app->getDateTime()->format('H:i'),
            'duration'    => $app->getDuration(),
            'description' => $app->getDescription(),
            'appId'       => $app->getId(),
            'gender'      => $app->getClient()->getGender(),
            'client'      => $app->getClient(),
            'doctor'      => $app->getUser(),
            'services'    => $this->getServiceManager()->all(),
            'country'     => $this->getCountry(),
            'directions'  => $this->getClientDirectionManager()->all(),
        ];
    }

    private function getFormData(Request $request)
    {
        $date   = \DateTime::createFromFormat('d/m/Y H:i',$request->get('date')." ". $request->get('time'));
        $doctor = $this->getDoctorManager()->findUserBy(['id' => $request->get('doctorId')]);
        $office = $this->getOfficeManager()->get($request->get('officeId'));
        if (!$this->isWorkDate($date, $doctor, $office)) {
            return false;
        }

        return [
            'directions' => $this->getClientDirectionManager()->all(),
            'office'     => $office,
            'services'   => $this->getServiceManager()->all(),
            'country'    => $this->getCountry(),
            'doctor'     => $doctor,
            'date'       => $request->get('date'),
            'time'       => $request->get('time'),
        ];
    }

    /**
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
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        if ($request->get('appId')) {
            $data = $this->getFormDataByAppId($request->get('appId'));
        } else {
            $data = $this->getFormData($request);
        }

        if ($data) {
            return $this->render('@OrtofitBackOfficeFront/Appointment/form.html.twig', $data);
        }

        return $this->render('@OrtofitBackOfficeFront/Appointment/err.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function preOrderAction(Request $request)
    {
        /** @var Appointment $app */
        $app  = $this->getAppointmentManager()->get($request->get('appId'));
        $data = [
            'appointment' => $app
        ];

        return $this->render('@OrtofitBackOfficeFront/Appointment/preOrderModal.html.twig', $data);
    }

    /**
     * @param integer $appId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function moveAction($appId)
    {
        /** @var Appointment $app */
        $app        = $this->getAppointmentManager()->get($appId);
        $schedules  = $this->getScheduleManager()->findByDate($app->getDateTime(), $app->getOffice(), $app->getUser());
        //$allowTimes = $this->getScheduleManager()->getAllowTimesInFormat($schedules);
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

        return $this->render('@OrtofitBackOfficeFront/Appointment/appMoveForm.html.twig', $data);
    }

}
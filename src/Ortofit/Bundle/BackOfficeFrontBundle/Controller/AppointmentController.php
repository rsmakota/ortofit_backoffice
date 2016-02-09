<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
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
     * @param integer   $userId
     * @param integer   $officeId
     *
     * @return bool
     */
    private function isWorkDate($date, $userId, $officeId)
    {
        $office   = $this->getOfficeManager()->get($officeId);
        $user     = $this->getDoctorManager()->findUserBy(['id' => $userId]);
        $schedule = $this->getScheduleManager()->findByDate($date, $office, $user);
        if ($schedule) {
            return true;
        }

        return false;
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
        $date = \DateTime::createFromFormat('d/m/Y H:i',$request->get('date')." ". $request->get('time'));
        if (!$this->isWorkDate($date, $request->get('userId'), $request->get('officeId'))) {
            return $this->render('@OrtofitBackOfficeFront/Appointment/err.html.twig');
        }
        if ($request->get('userId'))
        $data = [
            'directions' => $this->getClientDirectionManager()->all(),
            'offices'    => $this->getOfficeManager()->all(),
            'services'   => $this->getServiceManager()->all(),
            'country'    => $this->getCountry(),
            'doctors'    => $this->getDoctors(),
            'officeId'   => $request->get('officeId'),
            'date'       => $request->get('date'),
            'time'       => $request->get('time'),
        ];

        if ($request->get('appId')) {
            /** @var Appointment $app */
            $app = $this->getAppointmentManager()->get($request->get('appId'));
            $data['serviceId']   = $app->getService()->getId();
            $data['doctorId']    = $app->getUser()->getId();
            $data['msisdn']      = $app->getClient()->getLocalMsisdn();
            $data['clientName']  = $app->getClient()->getName();
            $data['directionId'] = $app->getClient()->getClientDirection()->getId();
            $data['officeId']    = $app->getOffice()->getId();
            $data['date']        = $app->getDateTime()->format('d/m/Y');
            $data['time']        = $app->getDateTime()->format('H:i');
            $data['duration']    = $app->getDuration();
            $data['description'] = $app->getDescription();
            $data['appId']       = $app->getId();
            $data['gender']      = $app->getClient()->getGender();
            $data['client']      = $app->getClient();
        }

        return $this->render('@OrtofitBackOfficeFront/Appointment/form.html.twig', $data);
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

}
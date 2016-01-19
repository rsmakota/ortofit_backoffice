<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppointmentController
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Controller
 */
class AppointmentController extends BaseController
{
    /**
     * @param Client $client
     * @param string $name
     *
     * @return bool
     */
    private function updateClientName(Client $client, $name)
    {
        if (($client->getName() == $name) || empty($name)) {
            return $client;
        }
        $data = [
            'id'              => $client->getId(),
            'msisdn'          => $client->getMsisdn(),
            'name'            => $name,
            'gender'          => $client->getGender(),
            'country'         => $client->getCountry(),
            'clientDirection' => $client->getClientDirection()
        ];

        return $this->getClientManager()->update(new ParameterBag($data));

    }

    /**
     * @param integer $doctorId
     *
     * @return User
     */
    private function findDoctor($doctorId)
    {
        return $this->getDoctorManager()->findUserBy(['id' => $doctorId]);
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
     * @param ParameterBag $bag
     *
     * @return Client
     */
    private function getClient($bag)
    {
        /** @var Client $client */
        $clientId = $bag->get('clientId');
        if (!empty($clientId)) {
            $client = $this->getClientManager()->get($clientId);
            if (null != $client) {
                return $this->updateClientName($client, $bag->get('clientName'));
            }
        }

        $client = $this->getClientManager()->findOneBy(['msisdn' => $bag->get('msisdn')]);
        if ($client) {
            return $this->updateClientName($client, $bag->get('clientName'));
        }
        $data = [
            'msisdn'          => $bag->get('msisdn'),
            'name'            => $bag->get('clientName'),
            'gender'          => $bag->get('gender'),
            'country'         => $this->getCountryManager()->getDefault(),
            'clientDirection' => $this->getClientDirectionManager()->get($bag->get('clientDirectionId'))
        ];

        return $this->getClientManager()->create(new ParameterBag($data));
    }

    /**
     * @param ParameterBag $bag
     *
     * @return array
     */
    private function prepareAppData($bag)
    {
        return [
            'id'          => $bag->get('appId'),
            'client'      => $this->getClient($bag),
            'dateTime'    => new \DateTime($bag->get('dateTime')),
            'duration'    => $bag->get('duration'),
            'description' => $bag->get('description'),
            'office'      => $this->getOfficeManager()->get($bag->get('officeId')),
            'service'     => $this->getServiceManager()->get($bag->get('serviceId')),
            'state'       => Appointment::STATE_RECORD,
            'user'        => $this->findDoctor($bag->get('doctorId')),
        ];
    }

    /**
     * @param ParameterBag $bag
     *
     * @return ParameterBag
     */
    private function createAppointment($bag)
    {
        $data = $this->prepareAppData($bag);
        $this->getAppointmentManager()->create(new ParameterBag($data));
    }

    /**
     * @param ParameterBag $bag
     *
     * @return ParameterBag
     */
    private function updateAppointment($bag)
    {

        $data = $this->prepareAppData($bag);
        $this->getAppointmentManager()->update(new ParameterBag($data));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $offices = $this->getOfficeManager()->all();
        $activeOfficeId = $offices[0]->getId();

        return $this->render('@OrtofitBackOffice/Appointment/index.html.twig', ['offices' => $offices, 'activeOfficeId'=>$activeOfficeId]);
    }


    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createAction(Request $request)
    {
        try {
            $this->createAppointment($request->request);

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        try {
            $this->updateAppointment($request->request);

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function deleteAction(Request $request)
    {
        try {
            $this->getAppointmentManager()->remove($request->get('appId'));

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
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

        return $this->render('@OrtofitBackOffice/Appointment/form.html.twig', $data);
    }



    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getAppAction(Request $request)
    {
        $fromDay = new \DateTime('first day of this month');
        $toDay   = new \DateTime('last day of this month');

        if (null != $request->get('start')) {
            $fromDay = new \DateTime($request->get('start'));
        }
        if (null != $request->get('end')) {
            $toDay = new \DateTime($request->get('end'));
        }
        $data = [
            'from'      => $fromDay,
            'to'        => $toDay,
            'office_id' => $request->get('office_id')
        ];
        $app = $this->getAppointmentManager()->findByRange(new ParameterBag($data));
        $responseData = [];
        foreach ($app as $appointment) {
            $responseData[] = $appointment->getCalendarData();
        }
        $responseData = array_merge($responseData, $this->getParameter('not_active_hours'));

        return new JsonResponse($responseData);
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

        return $this->render('@OrtofitBackOffice/Appointment/preOrderModal.html.twig', $data);
    }

    /**
     * @return JsonResponse
     */
    public function workHoursAction()
    {
        return new JsonResponse($this->getParameter('work_hours'));
    }
}
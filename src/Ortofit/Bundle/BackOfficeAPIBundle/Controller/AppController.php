<?php
/**
 * @copyright 2015 ortofit_back_office
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRange;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppointmentController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class AppController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeAPIBundle\EventService\EventService
     */
    private function getEventService()
    {
        return $this->get('backoffice_api.event_service');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager
     */
    private function getScheduleManager()
    {
        return $this->get('ortofit_back_office.schedule_manage');
    }

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
     * @param integer $userId
     *
     * @return JsonResponse
     */
    public function getAppAction(Request $request, $userId = null)
    {
        $range = new DateRange(
            $request->get('start', 'first day of this month'),
            $request->get('end', 'last day of this month')
        );
        $response = [];
        $doctor   = null;
        $office   = $this->getOfficeManager()->get($request->get('office_id'));

        if ($userId) {
            $doctor = $this->getDoctorManager()->findUserBy(['id' => $userId]);
        }
        $app  = $this->getAppointmentManager()->findByRange($range, $office, $doctor);
        $offH = $this->getOffHoursEvents($range, $office, $doctor);

        foreach ($app as $appointment) {
            $response[] = $appointment->getCalendarData();
        }
        $response   = array_merge($response, $offH);

        return new JsonResponse($response);
    }


    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function workHoursAction(Request $request)
    {
//        $user      = $this->getDoctorManager()->findUserBy(['id' => $request->get('userId', 0)]);
//        $office    = $this->getOfficeManager()->get($request->get('officeId'));
//        $schedule
        $workHours = [
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
            ['start' => 1, 'end' => 1],
        ];

        return new JsonResponse($workHours);
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User|null          $user
     *
     * @return array
     */
    private function getOffHoursEvents($range, $office, $user)
    {
        $data   = [];
        $events = $this->getEventService()->createOffHoursEvents($range, $office, $user);

        foreach ($events as $event) {
            $data[] = $event->getData();
        }

        return $data;
    }
}
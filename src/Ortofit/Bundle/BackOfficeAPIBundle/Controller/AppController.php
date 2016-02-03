<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
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
    public function getAppAction(Request $request, $userId=null)
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
            'office_id' => $request->get('office_id'),
        ];
        if ($userId) {
            $data['userId'] = $userId;
        }
        $app = $this->getAppointmentManager()->findByRange(new ParameterBag($data));
        $responseData = [];
        foreach ($app as $appointment) {
            $responseData[] = $appointment->getCalendarData();
        }
        $responseData[] = [
            'start'    => '09:00',
            'end'      => '10:00',
            'dow'      => [1,2,3,4,5,6],
            'color'    => '#222D32',
            'overlap'  => true,
            'rendering'=> 'background',
        ];
        $responseData[] = [
            'start'    => '19:00',
            'end'      => '20:00',
            'dow'      => [1,2,3,4,5,6],
            'color'    => '#222D32',
            'overlap'  => true,
            'rendering'=> 'background',
        ];
        $responseData[] = [
            'start'    => '15:00',
            'end'      => '20:00',
            'dow'      => [0],
            'color'    => '#222D32',
            'overlap'  => true,
            'rendering'=> 'background',
        ];

        return new JsonResponse($responseData);
    }


    /**
     * @return JsonResponse
     */
    public function workHoursAction()
    {
        $workHours = [
            ['start' => 9,  'end' => 15],
            ['start' => 10, 'end' => 19],
            ['start' => 10, 'end' => 19],
            ['start' => 10, 'end' => 19],
            ['start' => 10, 'end' => 19],
            ['start' => 10, 'end' => 19],
            ['start' => 10, 'end' => 19],
        ];

        return new JsonResponse($workHours);
    }
}
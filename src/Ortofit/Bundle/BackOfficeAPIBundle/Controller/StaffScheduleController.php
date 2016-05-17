<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Rsmakota\UtilityBundle\Date\DateRange;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StaffSchedule
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class StaffScheduleController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\ScheduleManager
     */
    private function getScheduleManager()
    {
        return $this->get('ortofit_back_office.schedule_manage');
    }



    /**
     * @param Request $request
     * @param integer $userId
     *
     * @return JsonResponse
     */
    public function getSchedulesAction(Request $request, $userId = null)
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
        $schedules  = $this->getScheduleManager()->findByRange($range, $office, $doctor);
        foreach ($schedules as $schedule) {
            $response[] = $schedule->getCalendarData();
        }

        return new JsonResponse($response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request)
    {
        try {
            $bag = [
                'office'    => $this->getOfficeManager()->rGet($request->get('officeId')),
                'user'      => $this->getDoctorManager()->findUserBy(['id'=> $request->get('doctorId')]),
                'startHour' => new \DateTime($request->get('startTime')),
                'endHour'   => new \DateTime($request->get('endTime')),
            ];
            $this->getScheduleManager()->create(new ParameterBag($bag));
            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAction(Request $request)
    {
        try {
            $bag = [
                'id'        => $request->get('id'),
                'office'    => $this->getOfficeManager()->rGet($request->get('officeId')),
                'user'      => $this->getDoctorManager()->findUserBy(['id'=> $request->get('doctorId')]),
                'startHour' => new \DateTime($request->get('startTime')),
                'endHour'   => new \DateTime($request->get('endTime')),
            ];
            $this->getScheduleManager()->update(new ParameterBag($bag));
            
            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
    
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request) 
    {
        try {
            $id = $request->get('id');
            $this->getScheduleManager()->remove($id);

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
    
}
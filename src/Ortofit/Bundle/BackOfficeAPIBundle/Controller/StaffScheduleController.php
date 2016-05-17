<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Rsmakota\UtilityBundle\Date\DateRange;
use Symfony\Component\HttpFoundation\JsonResponse;
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
//        $offH = $this->getOffHoursEvents($range, $office, $doctor);

        foreach ($schedules as $schedule) {
            $response[] = $schedule->getCalendarData();
        }
//        $response   = array_merge($response, $offH);

        return new JsonResponse($response);
    }
}
<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AppReasonController
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class AppReasonController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\ReasonManager
     */
    private function getReasonManager()
    {
        return $this->get("ortofit_back_office.reason_manage");
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentReasonManager
     */
    private function getAppReasonManager()
    {
        return $this->get("ortofit_back_office.appointment_reason_manage");
    }
    public function createAction(Request $request)
    {
        try {
            $reason = $this->getReasonManager()->get($request->get('reasonId'));
            /** @var Appointment $app */
            $app    = $this->getAppointmentManager()->get($request->get('appId'));
            $date   = new \DateTime($request->get('dateTime'));
            $bag    = new ParameterBag([
                "reason"      => $reason,
                "appointment" => $app,
                "created"     => $date,
                "user"        => $this->getUser()
            ]);
            $this->getAppReasonManager()->create($bag);
            $app->setState(Appointment::STATE_CLOSE_REASON);
            $this->getAppointmentManager()->merge($app);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }

        return $this->createSuccessJsonResponse();
    }
}
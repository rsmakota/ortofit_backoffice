<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRange;
use Symfony\Component\HttpFoundation\Request;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonServiceManager;

class ReportController extends BaseController
{
    /**
     * @return PersonServiceManager
     */
    private function getPersonServiceManager()
    {
        return $this->get('ortofit_back_office.person_service_manage');
    }

    private function formatUserData(User $user)
    {
        return ['userName' => $user->getName(), 'userId' => $user->getId()];
    }

    private function formatServiceData($service, $count, $range, $office, $user) {
        $data = [
            'serviceName' => $service->getName(),
            'serviceId'   => $service->getId(),
            'count'       => $count,
        ];
        if ($service->getAlias() === Service::ALIAS_INSOLES_MANUFACTURING) {
            $insoleData = [];
            $insoles = $this->getPersonServiceManager()->getInsoles($range, $office, $user);
            foreach ($insoles as $insoleArr) {
                $insoleData[] = ['type' => $insoleArr['type']->getName(), 'count' => $insoleArr['c']];
            }
            $data['insole'] = $insoleData;

        }
        return $data;
    }

    public function getAction(Request $request)
    {
        $office   = $this->getOfficeManager()->rGet($request->get('officeId'));
        $dateFrom = new \DateTime($request->get('dateFrom'));
        $dateTo   = new \DateTime($request->get('dateTo'));
        $range    = new DateRange($dateFrom, $dateTo);
        $users    = $this->getPersonServiceManager()->getUsersInOffice($range, $office);
        $data     = [];
        foreach ($users as $user) {
            $userData     = $this->formatUserData($user);
            $userServices = $this->getPersonServiceManager()->getUserServices($range, $office, $user);
            $apps         = $this->getAppointmentManager()->findByRange($range, $office, $user);
            $flyers       = [];
            $forwarders   = [];
            foreach ($apps as $app) {
                $forwarder = $app->getForwarder();
                if (empty($forwarder) || (Appointment::STATE_SUCCESS != $app->getState()) ) {
                    continue;
                }
                if ($app->getFlyer()) {
                    $flyers[$forwarder] = !array_key_exists($forwarder, $flyers) ? 1 : ($flyers[$forwarder] + 1);
                }
                $forwarders[$forwarder] = !array_key_exists($forwarder, $forwarders) ? 1 : ($forwarders[$forwarder] + 1);
            }
            $userServiceData = [];
            foreach ($userServices as $userService) {
                /** @var Service $service */
                $service = $userService['service'];
                $userServiceData[] = $this->formatServiceData($service, $userService['c'], $range, $office, $user);

            }
            $userData['service']    = $userServiceData;
            $userData['flyers']     = $flyers;
            $userData['forwarders'] = $forwarders;
            $data[] = $userData;
        }

        return $this->createSuccessJsonResponse($data);
    }

    public function forwarderAction(Request $request)
    {
        $forwarders = [];
        if ($request->get('dateFrom') && $request->get('dateTo')) {
            $dateFrom = new \DateTime($request->get('dateFrom'));
            $dateTo   = new \DateTime($request->get('dateTo'));
            $range    = new DateRange($dateFrom, $dateTo);
            $apps     = $this->getAppointmentManager()->findByRange($range, null, null);
            $forwarders = [];
            foreach ($apps as $app) {
                $forwarder = $app->getForwarder();
                if (($app->getState() != $app::STATE_SUCCESS) ||(empty($forwarder))) {
                    continue;
                }
                if (array_key_exists($forwarder, $forwarders)) {
                    $forwarders[$forwarder] = $forwarders[$forwarder] + 1;
                } else {
                    $forwarders[$forwarder] = 1;
                }
            }
        }

        return $this->createSuccessJsonResponse($forwarders);
    }
}
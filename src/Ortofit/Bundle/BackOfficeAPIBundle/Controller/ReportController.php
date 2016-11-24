<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


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
        $office     = $this->getOfficeManager()->rGet($request->get('officeId'));
        $dateFrom   = new \DateTime($request->get('dateFrom'));
        $dateTo     = new \DateTime($request->get('dateTo'));
        $range      = new DateRange($dateFrom, $dateTo);
        $users      = $this->getPersonServiceManager()->getUsersInOffice($range, $office);
        $data       = [];
        foreach ($users as $user) {
            $userData        = $this->formatUserData($user);
            $userServices    = $this->getPersonServiceManager()->getUserServices($range, $office, $user);
            $userServiceData = [];
            foreach ($userServices as $userService) {
                /** @var Service $service */
                $service = $userService['service'];
                $userServiceData[] = $this->formatServiceData($service, $userService['c'], $range, $office, $user);
//                if ($service->getAlias() === Service::ALIAS_INSOLES_MANUFACTURING) {
//                    $insoleData = [];
//                    $insoles = $this->getPersonServiceManager()->getInsoles($range, $office, $user);
//                    foreach ($insoles as $insoleArr) {
//                        $insoleData[] = ['type' => $insoleArr['type']->getName(), 'count' => $insoleArr['c']];
//                    }
//                    $userServiceData['insole'] = $insoleData;
//                }

            }
            $userData['service'] = $userServiceData;
            $data[] = $userData;
        }

        return $this->createSuccessJsonResponse($data);
    }
}
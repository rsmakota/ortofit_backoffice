<?php
/**
 * @copyright 2016 ortofit_back_office
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\AppReminder;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppReminderManager;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ReminderController
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class AppReminderController extends BaseController
{
    /**
     * @return AppReminderManager
     */
    private function getManager()
    {
        return $this->get('ortofit_back_office.app_reminder_manage');
    }

    /**
     * @param AppReminder $remind
     *
     * @return array
     */
    private function formatData($remind)
    {
        /** @var Appointment $app */
        /** @var Client $client */
        $app    = $remind->getAppointment();
        $client = $app->getClient();
        return [
            'id'          => $remind->getId(),
            'msisdn'      => $client->getMsisdn(),
            'name'        => $client->getName(),
            'date'        => $app->getDateTime()->format('d/m/Y'),
            'description' => $remind->getDescription()
        ];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction()
    {
        $limit   = $this->getParameter('app_reminds_limit');
        $manager = $this->getManager();
        /** @var AppReminder[] $reminds */
        $reminds = $manager->findByDate(new \DateTime(), false, $limit);
        $data    = [];
        foreach ($reminds as $remind) {
            $data[] = $this->formatData($remind);
        }
        
        return $this->createSuccessJsonResponse($data);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function processAction(Request $request)
    {
        $remindId = $request->get('id');
        try {
            /** @var AppReminder $remind */
            $remind   = $this->getManager()->rGet($remindId);
            $remind->setProcessed(true);
            $this->getManager()->merge($remind);

            return $this->createSuccessJsonResponse(['id' => $remindId]);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, []);
        }
    }

    public function getNumAction()
    {
        $manager = $this->getManager();
        $num     =  $manager->countByDate(new \DateTime(), false);
        return $this->createSuccessJsonResponse(['num' => $num]);
    }
}
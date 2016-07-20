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
use Symfony\Component\Config\Definition\Exception\Exception;
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
        $app      = $remind->getAppointment();
        $client   = $app->getClient();
        $services = $app->getPersonServices();
        $servicesNames = [];
        foreach ($services as $service) {
            $servicesNames[] = $service->getService()->getName();
        }
        return [
            'id'          => $remind->getId(),
            'msisdn'      => $client->getMsisdn(),
            'name'        => $client->getName(),
            'date'        => $app->getDateTime()->format('d/m/Y'),
            'description' => $remind->getDescription(),
            'remind_date' => $remind->getDateTime()->format('d/m/Y'),
            'services'    => implode(', ', $servicesNames),
            'appId'       => $app->getId(),
            'remindId'    => $remind->getId()
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

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateAction(Request $request)
    {
        $remindId = $request->get('id');
        $date     = $request->get('date');
        $description = $request->get('description');
        try {
            if (!$date) {
                throw new Exception('Can\'t get date or it\'s wrong');
            }
            $dateTime = \DateTime::createFromFormat('d/m/Y', $date);
             /** @var AppReminder $remind */
            $remind = $this->getManager()->rGet($remindId);
            $remind->setDateTime($dateTime);
            $remind->setDescription($description);
            $this->getManager()->merge($remind);

            return $this->createSuccessJsonResponse(['id' => $remindId]);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, []);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function removeAction(Request $request)
    {
        try {
             /** @var AppReminder $remind */
            $this->getManager()->remove($request->get('id'));

            return $this->createSuccessJsonResponse([]);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, []);
        }
    }

}
<?php
/**
 * @copyright 2016 ortofit_back_office
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\AppReminder;

/**
 * Class ReminderController
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class AppReminderController extends BaseController
{
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
        return [
            'id'          => $remind->getId(),
            'msisdn'      => $remind->getAppointment()->getClient()->getMsisdn(),
            'date'        => $remind->getAppointment()->getDateTime()->format('d/m/Y'),
            'description' => $remind->getDescription()
        ];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction()
    {
        $limit   = $this->getParameter('app_reminds_limit');
        $reminds = $this->getManager()->findBy(['processed'=>false], [], $limit );
        $data    = [];
        foreach ($reminds as $remind) {
            $data[] = $this->formatData($remind);
        }
        
        return $this->createSuccessJsonResponse($data);
    }
    
    public function processAction()
    {
        return $this->createSuccessJsonResponse([]);
    }
}
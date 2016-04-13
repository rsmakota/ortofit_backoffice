<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Order;
use \Ortofit\Bundle\BackOfficeBundle\EntityManager\OrderManager;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class OrderController
 * 
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class OrderController extends BaseController
{
    /**
     * @return OrderManager
     */
    private function getManager()
    {
        return $this->get('ortofit_back_office.order_manage');
    }
    
    /**
     * @param Order $order
     *
     * @return array
     */
    private function formatData($order)
    {

        /** @var Client $client */
        $client    = $order->getClient();
        return [
            'id'     => $order->getId(),
            'msisdn' => $client->getMsisdn(),
            'date'   => $order->getCreated()->format('d/m/Y')
        ];
    }

    /**
     * @return JsonResponse
     */
    public function getUnprocessedAction()
    {
        $limit   = $this->getParameter('app_orders_limit');
        $manager = $this->getManager();
        $data    = [];
        try {
            $orders  = $manager->findNonProcessed($limit);
            foreach ($orders as $order) {
                $data[] = $this->formatData($order);
            }
            return $this->createSuccessJsonResponse($data);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, []);
        }
    }

    /**
     * @return JsonResponse
     */
    public function getUnprocessedCountAction()
    {
        $manager = $this->getManager();
        try {
            $num = $manager->countUnprocessed();
            
            return $this->createSuccessJsonResponse(['num' => $num]);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, []);
        }
    }
    
}
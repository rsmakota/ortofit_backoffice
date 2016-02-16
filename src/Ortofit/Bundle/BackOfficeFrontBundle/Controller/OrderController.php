<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OrderController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class OrderController extends Controller
{
    /**
     * @return \Ortofit\Bundle\BackOfficeFrontBundle\Order\Service\OrderService
     */
    private function getOrderService()
    {
        return $this->get('backoffice_front.order_service');
    }

    /**
     * @return Response
     */
    public function processAction()
    {
        $service = $this->getOrderService();
        $flow    = $service->getFlow();
        $flow->process();

        return $flow->getResponse();
    }
}
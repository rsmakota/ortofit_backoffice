<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OrderController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class OrderController extends Controller
{
    /**
     * @return \Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow\OrderFlow
     */
    private function getOrderFlow()
    {
        return $this->get('bf.flow_order');
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function processAction(Request $request)
    {
        $flow = $this->getOrderFlow();
        if ($request->get('isNew')) {
            $flow->clear();
        }
        $flow->process();

        return $flow->getResponse();
    }
}
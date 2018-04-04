<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow\FlowInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OrderController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class AppOrderController extends Controller
{
    /**
     * @return FlowInterface
     */
    private function getOrderFlow()
    {
        return $this->get('bf.flow_order');
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @throws \Exception
     */
    public function processAction(Request $request)
    {
        $flow = $this->getOrderFlow();
        if (null !== $request->get('stateId')) {
            $flow->seek($request->get('stateId'));
        }
        $flow->process();
        //TODO: needs Exception processing
        return $flow->getResponse();
    }
}
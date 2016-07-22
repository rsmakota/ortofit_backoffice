<?php

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Ortofit\Bundle\BackOfficeFrontBundle\Paginator\Paginator;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class ClientController extends BaseController
{

    private function getLimit()
    {
        return $this->getParameter('front_table_rows_limit');
    }

    /**
     * @param integer $current
     * @param string  $msisdn
     *
     * @return Paginator
     */
    private function getPaginator($current, $msisdn = null)
    {
        $limit = $this->getLimit();
        if (null == $msisdn) {
            $count = $this->getClientManager()->count();
        } else {
            $count = $this->getClientManager()->countLike(['msisdn' => '%'.$msisdn.'%']);
        }

        return new Paginator($limit, $current, $count);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $msisdn    = $request->get('msisdn');
        $manager   = $this->getClientManager();
        $limit     = $this->getLimit();
        $orderBy   = ['id'=>'ASC'];
        $paginator = $this->getPaginator($request->get('page', 1), $msisdn);
        $offset    = $limit * ($paginator->current() - 1);

        if (null != $msisdn) {
            $clients = $manager->findLike(['msisdn' => '%'.$msisdn.'%'], $orderBy, $limit, $offset);
        } else {
            $clients = $manager->findBy([], $orderBy, $limit, $offset);
        }
        $data = [
            'clients'   => $clients,
            'paginator' => $paginator,
            'msisdn'    => $msisdn,
            'page_route_name' => 'bf_client'
        ];

        return $this->render('@OrtofitBackOfficeFront/Client/index.html.twig', $data);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        $data = [
            'directions' => $this->getClientDirectionManager()->all()
        ];

        if ($request->get('id')) {
            /** @var Client $client */
            $client = $this->getClientManager()->get($request->get('id'));
            $data['client'] = $client;
        }

        return $this->render('@OrtofitBackOfficeFront/Client/createForm.html.twig', $data);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request)
    {
        $data   = [];
        $client = null;

        if (null != $request->get('id')) {
            $client = $this->getClientManager()->get($request->get('id'));
        } elseif (null != $request->get('msisdn')) {
            $client = $this->getClientManager()->findOneBy(['msisdn' => $request->get('msisdn')]);
        } else {
            $data['error'] = "Can't get a client without params";
        }

        $data['client']  = $client;
        $data['apps']    = $this->getAppointmentManager()->findBy(['client' => $client], ['dateTime' => "DESC"], 5);
        $data['numApps'] = $this->getAppointmentManager()->countByClient($client);

        return $this->render('@OrtofitBackOfficeFront/Client/detail.html.twig', $data);
    }
    
}

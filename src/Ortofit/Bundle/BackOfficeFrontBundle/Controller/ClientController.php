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
        return 20;
    }

    /**
     * @param integer $current
     *
     * @return Paginator
     */
    private function getPaginator($current)
    {
        $limit = $this->getLimit();
        $count = $this->getClientManager()->count();

        return new Paginator($limit, $current, $count);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $manager   = $this->getClientManager();
        $paginator = $this->getPaginator($request->get('page', 1));
        $limit     = $this->getLimit();
        $clients   = $manager->findBy([], ['id'=>'ASC'], $limit, ($limit * ($paginator->current() - 1)));
        $data = [
            'paginator' => $paginator,
            'clients' => $clients,
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

}

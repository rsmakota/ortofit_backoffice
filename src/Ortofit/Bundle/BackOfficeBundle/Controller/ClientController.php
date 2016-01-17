<?php

namespace Ortofit\Bundle\BackOfficeBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Paginator\Paginator;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Controller
 */
class ClientController extends BaseController
{

    private function getLimit()
    {
        return 20;
    }

    /**
     * @return null|Country
     */
    protected function getCountry()
    {
        return $this->get('ortofit_back_office.client_country_manage')->getDefault();
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

        return $this->render('@OrtofitBackOffice/Client/index.html.twig', $data);
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

        return $this->render('@OrtofitBackOffice/Client/createForm.html.twig', $data);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction(Request $request)
    {
        try {
            $data = [
                'country' => $this->getCountry(),
                'clientDirection' => $this->getClientDirectionManager()->get($request->get('clientDirectionId')),
                'msisdn' => $request->get('msisdn'),
                'name' => $request->get('name'),
                'gender' => $request->get('gender'),
            ];
            $this->getClientManager()->create(new ParameterBag($data));

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateAction(Request $request)
    {
        try {
            $data = [
                'country'         => $this->getCountry(),
                'clientDirection' => $this->getClientDirectionManager()->get($request->get('clientDirectionId')),
                'msisdn'          => $request->get('msisdn'),
                'name'            => $request->get('name'),
                'gender'          => $request->get('gender'),
                'id'              => $request->get('id')
            ];
            $this->getClientManager()->update(new ParameterBag($data));

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findAction(Request $request)
    {
        try {
            $msisdn = $request->get('msisdn');
            if (null == $msisdn) {
                throw new \Exception('Can\'t find client without msisdn');
            }
            /** @var Client $client */
            $client = $this->getClientManager()->findOneBy(['msisdn' => $msisdn]);
            if (null == $client) {
                throw new \Exception('A client is not found');
            }

            return $this->createSuccessJsonResponse($client->getData());
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }


}

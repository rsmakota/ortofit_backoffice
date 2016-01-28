<?php

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class ClientController extends BaseController
{

    /**
     * @return null|Country
     */
    protected function getCountry()
    {
        return $this->get('ortofit_back_office.client_country_manage')->getDefault();
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
                'country'         => $this->getCountry(),
                'clientDirection' => $this->getClientDirectionManager()->get($request->get('clientDirectionId')),
                'msisdn'          => $request->get('msisdn'),
                'name'            => $request->get('name'),
                'gender'          => $request->get('gender'),
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
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getAction(Request $request)
    {
        try {
            $clients = $this->getClientManager()->all();
            $data = [];
            foreach ($clients as $client) {
                $data[] = $client->getData();
            }
            $extra = [
                "draw" => 1,
                "recordsTotal" => 57,
                "recordsFiltered" => 57,
            ];
            return $this->createSuccessJsonResponse($data, $extra);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }


}

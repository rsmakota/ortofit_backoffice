<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonController
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Controller
 */
class PersonController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager
     */
    private function getPersonManager()
    {
        return $this->get('ortofit_back_office.person_manage');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\FamilyStatusManager
     */
    private function getFamilyStatusesManager()
    {
        return $this->get('ortofit_back_office.client_family_status_manage');
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
                'client'       => $this->getClientManager()->get($request->get('clientId')),
                'born'         => new \DateTime($request->get('born')),
                'name'         => $request->get('name'),
                'familyStatus' => $this->getFamilyStatusesManager()->get($request->get('familyStatusId')),
            ];
            $this->getPersonManager()->create(new ParameterBag($data));

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
                'client'       => $this->getClientManager()->get($request->get('clientId')),
                'born'         => new \DateTime($request->get('born')),
                'name'         => $request->get('name'),
                'id'           => $request->get('id'),
                'familyStatus' => $this->getFamilyStatusesManager()->get($request->get('familyStatusId')),
            ];
            $this->getPersonManager()->update(new ParameterBag($data));

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
}
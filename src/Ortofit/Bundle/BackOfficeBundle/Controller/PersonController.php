<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonController
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Controller
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $manager = $this->getClientManager();
        $client  = $manager->get($request->get('clientId'));
        $lastApp = $this->getAppointmentManager()->findOneBy(['client'=>$client], ['id'=>'DESC']);
        $data = [
            'client' => $client,
            'lastApp'=> $lastApp
        ];

        return $this->render('@OrtofitBackOffice/Person/index.html.twig', $data);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        $client = $this->getClientManager()->get($request->get('clientId'));
        $familyStatuses = $this->getFamilyStatusesManager()->all();
        $data = [
            'client' => $client,
            'familyStatuses' => $familyStatuses
        ];

        if ($request->get('id')) {
            $data['person'] = $this->getPersonManager()->get($request->get('id'));
        }

        return $this->render('@OrtofitBackOffice/Person/createForm.html.twig', $data);
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
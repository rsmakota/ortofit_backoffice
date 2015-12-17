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
class DiagnosisController extends BaseController
{
    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\PersonManager
     */
    private function getPersonManager()
    {
        return $this->get('ortofit_back_office.person_manage');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\DiagnosisManager
     */
    private function getDiagnosisManager()
    {
        return $this->get('ortofit_back_office.client_diagnosis_manage');
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function formAction(Request $request)
    {
        $person = $this->getPersonManager()->get($request->get('personId'));

        $data = [
            'person' => $person
        ];

        if ($request->get('id')) {
            $data['diagnosis'] = $this->getDiagnosisManager()->get($request->get('id'));
        }

        return $this->render('@OrtofitBackOffice/Diagnosis/createForm.html.twig', $data);
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
                'person'      => $this->getPersonManager()->get($request->get('personId')),
                'description' => $request->get('description'),
            ];
            $this->getDiagnosisManager()->create(new ParameterBag($data));

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
                'person'      => $this->getPersonManager()->get($request->get('personId')),
                'description' => $request->get('description'),
                'id'          => $request->get('id'),
            ];
            $this->getDiagnosisManager()->update(new ParameterBag($data));

            return $this->createSuccessJsonResponse();
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
}
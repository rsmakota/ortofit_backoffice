<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonController
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
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

        return $this->render('@OrtofitBackOfficeFront/Diagnosis/createForm.html.twig', $data);
    }

}
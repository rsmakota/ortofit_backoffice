<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

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

        return $this->render('@OrtofitBackOfficeFront/Person/index.html.twig', $data);
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

        return $this->render('@OrtofitBackOfficeFront/Person/createForm.html.twig', $data);
    }

}
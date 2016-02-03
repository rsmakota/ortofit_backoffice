<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Controller;


use Symfony\Component\HttpFoundation\Request;

class DoctorController extends BaseController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function allAction(Request $request)
    {
        try {
            $group = $this->get('fos_user.group_manager')->findGroupBy(['name' => 'Doctor']);
            $doctors = $group->getUsers();
            $data = [];
            foreach ($doctors as $doctor) {
                $data[] = $doctor->getDoctorData();
            }

            return $this->createSuccessJsonResponse($data);
        } catch (\Exception $e) {
            return $this->createFailJsonResponse($e, $request->request->all());
        }
    }
}
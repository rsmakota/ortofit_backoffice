<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DoctorRestController
 * @package Ortofit\Bundle\BackOfficeBundle\Controller
 */
class DoctorRestController extends Controller
{

    /**
     * @Rest\View
     */
    public function usersAction()
    {
        $users = $this->getDoctrine()->getManager()->getRepository(User::clazz())->findAll();

        return array('users' => $users);
    }
}
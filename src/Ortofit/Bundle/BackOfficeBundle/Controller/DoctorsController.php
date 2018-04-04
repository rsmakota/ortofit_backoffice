<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DoctorsController extends Controller
{

    /**
     * @return array
     * @View()
     */
    public function getDoctorsAction()
    {
        $group = $this->get('fos_user.group_manager')->findGroupBy(['name' => 'Doctor']);

        return ['doctors' => $group->getUsers()];
    }

}
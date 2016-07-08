<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\CountryManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientDirectionManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager;
/**
 * Class BaseController
 * 
 * @package Ortofit\Bundle\BackOfficeBundle\Controller
 */
class BaseController extends Controller
{
    /**
     * @return AppointmentManager
     */
    protected function getAppointmentManager()
    {
        return $this->get('ortofit_back_office.appointment_manage');
    }

    /**
     * @return ClientDirectionManager
     */
    protected function getClientDirectionManager()
    {
        return $this->get('ortofit_back_office.client_direction_manage');
    }
    /**
     * @return CountryManager
     */
    protected function getCountryManager()
    {
        return $this->get('ortofit_back_office.client_country_manage');
    }
    /**
     * @return ClientManager
     */
    protected function getClientManager()
    {
        return $this->get('ortofit_back_office.client_manage');
    }
    /**
     * @return OfficeManager
     */
    protected function getOfficeManager()
    {
        return $this->get('ortofit_back_office.office_manage');
    }

    /**
     * @return ServiceManager
     */
    protected function getServiceManager()
    {
        return $this->get('ortofit_back_office.service_manage');
    }

    /**
     * @return \FOS\UserBundle\Doctrine\UserManager
     */
    protected function getDoctorManager()
    {
        return $this->get('fos_user.user_manager');
    }

    /**
     * @return null|Country
     */
    protected function getCountry()
    {
        return $this->getCountryManager()->getDefault();
    }
    
    /**
     * @return ArrayCollection
     */
    protected function getDoctors()
    {
        $group = $this->get('fos_user.group_manager')->findGroupBy(['name' => 'Doctor']);

        return $group->getUsers();
    }
}
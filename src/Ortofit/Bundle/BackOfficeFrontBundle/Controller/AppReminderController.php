<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;

/**
 * Class AppReminderController
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Controller
 */
class AppReminderController extends BaseController
{

    public function indexAction()
    {

        return $this->render('@OrtofitBackOfficeFront/Reminder/index.html.twig', []);
    }
    
    public function orderAction()
    {
        return $this->render('@OrtofitBackOfficeFront/Reminder/order.html.twig', []);
    }
}
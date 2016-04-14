<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExtOrderController extends Controller
{

    public function indexAction()
    {

        return $this->render('@OrtofitBackOfficeFront/ExtOrder/index.html.twig', []);
    }
}
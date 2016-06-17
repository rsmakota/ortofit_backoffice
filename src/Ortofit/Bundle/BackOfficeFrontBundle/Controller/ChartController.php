<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Controller;


class ChartController extends BaseController
{
    
    public function indexAction()
    {
        return $this->render(
            '@OrtofitBackOfficeFront/Chart/index.html.twig',
            []);
    }
}
<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface StateInterface
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
interface StateInterface
{
    /**
     * @return void
     */
    public function process();

    /**
     * @return boolean
     */
    public function isCompleted();

    /**
     * @return string
     */
    public function getId();

    /**
     * @return Response
     */
    public function createResponse();
}
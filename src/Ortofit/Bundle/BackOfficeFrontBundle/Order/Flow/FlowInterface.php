<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow;

use Symfony\Component\HttpFoundation\Response;

/**
 * Interface FlowInterface
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow
 */
interface FlowInterface
{
    /**
     * @return void
     */
    public function process();

    /**
     * @return Response
     */
    public function getResponse();

    /**
     * @return void
     */
    public function clear();

    /**
     * @return boolean
     */
    public function isCompleted();

    /**
     * @return void
     */
    public function rewind();
}
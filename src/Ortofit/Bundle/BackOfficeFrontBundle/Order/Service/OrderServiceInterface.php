<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Service;

use Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow\FlowInterface;

/**
 * Interface OrderServiceInterface
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Service
 */
interface OrderServiceInterface
{
    /**
     * @return FlowInterface
     */
    public function getFlow();
}
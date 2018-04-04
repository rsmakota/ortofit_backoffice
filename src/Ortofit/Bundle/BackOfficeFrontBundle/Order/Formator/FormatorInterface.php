<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator;

/**
 * Interface FormatorInterface
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator
 */
interface FormatorInterface
{
    /**
     * @return mixed
     */
    public function getData();
}
<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Validator;

/**
 * Interface ValidatorInterface
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Validator
 */
interface ValidatorInterface
{
    /**
     * @return boolean
     */
    public function isValid();

    /**
     * @return string
     */
    public function getError();
}
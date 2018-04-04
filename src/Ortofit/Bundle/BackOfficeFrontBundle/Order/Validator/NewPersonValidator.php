<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Validator;

use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class NewPersonValidator
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Validator
 */
class NewPersonValidator implements ValidatorInterface
{
    private $reqFields = ['name', 'gender', 'born', 'familyStatusId', 'client'];
    private $error;
    private $valid = false;

    /**
     * NewPersonValidator constructor.
     *
     * @param ParameterBag $bag
     */
    public function __construct($bag)
    {
        foreach ($this->reqFields as $name) {
            if (!$bag->has($name)) {
                $this->error = printf('The parameter %s is absent', $name);
                return;
            }
        }

        $this->valid = true;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}
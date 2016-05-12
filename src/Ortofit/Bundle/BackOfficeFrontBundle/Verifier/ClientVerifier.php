<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Verifier;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;

/**
 * Class ClientVerifier
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Verifier
 */
class ClientVerifier implements VerifierInterface
{
    /**
     * @param ModelInterface $model
     * @return array
     */
    protected function isComplete($model)
    {
        in_array(null, get_class_vars(get_class($this)));
    }
    /**
     * @param ModelInterface $model
     *
     * @return boolean
     */
    public function isValid($model)
    {
        return $this->isComplete($model);
    }
}
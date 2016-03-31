<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Verifier;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;

/**
 * Interface VerifierInterface
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Verifier
 */
interface VerifierInterface
{
    /**
     * @param ModelInterface $model
     *
     * @return boolean
     */
    public function isValid($model);
}
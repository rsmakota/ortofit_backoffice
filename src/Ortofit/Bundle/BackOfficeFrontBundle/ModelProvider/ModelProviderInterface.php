<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider;

/**
 * Interface ModelProviderInterface
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider
 */
interface ModelProviderInterface
{
    /**
     * @return object
     */
    public function getModel();

    /**
     * @return string
     */
    public function getName();
}
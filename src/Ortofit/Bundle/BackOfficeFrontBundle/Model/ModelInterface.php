<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Model;

interface ModelInterface
{
    /**
     * @return array
     */
    public function getData();

    /**
     * @return boolean
     */
    public function isComplete();
}
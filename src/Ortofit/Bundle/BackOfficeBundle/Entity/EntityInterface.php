<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

/**
 * Interface EntityInterface
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 */
interface EntityInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @return array
     */
    public function getData();

    /**
     * @return string
     */
    static public function clazz();
}
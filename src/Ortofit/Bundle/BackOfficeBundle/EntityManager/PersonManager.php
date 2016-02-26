<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class PersonManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class PersonManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Person::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'person_manager';
    }

}
<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class CountryManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class CountryManager extends AbstractManager
{
    const DEFAULT_COUNTRY_NAME = 'Ukraine';
    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Country::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'country_manager';
    }
    public function getDefault()
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findOneBy(['name'=>self::DEFAULT_COUNTRY_NAME]);
    }

}
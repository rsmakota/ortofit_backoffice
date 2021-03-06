<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ServiceManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ServiceManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Service::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'service_manager';
    }

    /**
     * @param string $alias
     *
     * @return Service
     */
    public function findByAlias($alias)
    {
        return $this->findOneBy(['alias'=>$alias]);
    }

}
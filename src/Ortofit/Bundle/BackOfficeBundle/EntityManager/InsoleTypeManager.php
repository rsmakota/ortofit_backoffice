<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Ortofit\Bundle\BackOfficeBundle\Entity\Insole;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ClientManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class InsoleTypeManager extends AbstractManager
{
    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return InsoleType::class;
    }

//    /**
//     * @param ParameterBag $params
//     *
//     * @return object
//     */
//    public function create($params)
//    {
//        $entity = new InsoleType();
//        $entity->setName($params->get('name'));
//        $entity->setAlias($params->get('alias'));
//        $this->persist($entity);
//
//        return $entity;
//    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'insole_type_manager';
    }

}
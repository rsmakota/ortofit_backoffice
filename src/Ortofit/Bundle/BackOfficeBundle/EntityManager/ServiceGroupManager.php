<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2017 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;


use Ortofit\Bundle\BackOfficeBundle\Entity\ServiceGroup;

/**
 * Class ServiceGroupManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\EntityManager
 */
class ServiceGroupManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return ServiceGroup::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'service_group_manager';
    }
}
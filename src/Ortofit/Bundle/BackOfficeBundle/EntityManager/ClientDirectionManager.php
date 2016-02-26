<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;


use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ClientSourceManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ClientDirectionManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return ClientDirection::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clientDirection_manager';
    }

}
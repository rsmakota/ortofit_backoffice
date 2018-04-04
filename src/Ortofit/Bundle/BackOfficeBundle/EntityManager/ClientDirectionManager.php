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
        return ClientDirection::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clientDirection_manager';
    }

    /**
     * @return null|ClientDirection
     */
    public function getUnknown()
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findOneBy(['alias'=>ClientDirection::DIRECTION_ALIAS_UNKNOWN]);
    }
}
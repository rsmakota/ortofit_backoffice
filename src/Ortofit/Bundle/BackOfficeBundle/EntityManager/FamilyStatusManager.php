<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\FamilyStatus;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class FamilyStatusManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class FamilyStatusManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return FamilyStatus::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'familyStatus_manager';
    }

}
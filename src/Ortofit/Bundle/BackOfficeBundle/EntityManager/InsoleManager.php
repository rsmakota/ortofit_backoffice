<?php
/**
 * @copyright 2016 ortofit
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Insole;

/**
 * Class InsoleManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\EntityManager
 */
class InsoleManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Insole::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'insole_manager';
    }

}
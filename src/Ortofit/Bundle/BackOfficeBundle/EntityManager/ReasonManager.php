<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;


/**
 * Class CountryManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ReasonManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Reason::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'reason_manager';
    }


}
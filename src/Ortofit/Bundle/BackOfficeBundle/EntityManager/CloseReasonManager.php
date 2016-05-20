<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\CloseReason;


/**
 * Class CountryManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class CloseReasonManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return CloseReason::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'close_reason_manager';
    }


}
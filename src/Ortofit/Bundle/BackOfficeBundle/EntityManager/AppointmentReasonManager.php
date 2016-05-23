<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\AppointmentReason;


/**
 * Class CountryManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class AppointmentReasonManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return AppointmentReason::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'reason_manager';
    }


}
<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\AppReminder;


/**
 * Class PersonManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class AppReminderManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return AppReminder::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_reminder_manager';
    }

    /**
     * @param \DateTime $date
     * @param boolean   $process
     * @param integer   $limit
     *
     * @return AppReminder[]
     */
    public function findByDate($date, $process, $limit)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findByDate(
            $date,
            $process,
            $limit
        );
    }

}
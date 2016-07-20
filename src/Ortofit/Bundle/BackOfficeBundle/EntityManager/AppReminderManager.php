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

    /**
     * @param \DateTime $date
     * @param boolean   $process
     *
     * @return integer
     */
    public function countByDate($date, $process)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countByDate(
            $date,
            $process
        );
    }

    /**
     * @param string     $msisdn
     * @param array      $criteria
     * @param array|null $orderBy  ["fieldName" => "DESC/ASC"]
     * @param null       $limit
     * @param null       $offset
     *
     * @return AppReminder[]
     */
    public function findLikeMsisdn($msisdn, array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        if ($limit < 0 || $offset < 0) {
            return [];
        }
        return $this->enManager->getRepository($this->getEntityClassName())->findLikeMsisdn(
            $msisdn,
            $criteria,
            $orderBy,
            $limit,
            $offset
        );
    }
    /**
     * @param string $msisdn
     * @param array  $params
     *
     * @return integer
     */
    public function countLikeMsisdn($msisdn, array $params=[])
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countLikeMsisdn(
            $msisdn,
            $params
        );
    }
}
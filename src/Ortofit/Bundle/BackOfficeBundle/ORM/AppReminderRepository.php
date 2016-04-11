<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;

use Doctrine\ORM\EntityRepository;
use Ortofit\Bundle\BackOfficeBundle\Entity\AppReminder;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Class ScheduleRepository
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ORM
 */
class AppReminderRepository extends EntityRepository
{
    

    /**
     * @param \DateTime $date
     * @param boolean   $processed
     * @param integer   $limit
     * @return AppReminder[]
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByDate($date, $processed, $limit)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params  = ['date' => $date, 'processed' => $processed];

        $qb = $builder->select('a')
            ->from(AppReminder::clazz(), 'a')
            ->where("a.dateTime <= :date AND a.processed = :processed")
            ->setMaxResults($limit)
            ->setParameters($params);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
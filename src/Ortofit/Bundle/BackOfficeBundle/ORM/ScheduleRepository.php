<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;

use Doctrine\ORM\EntityRepository;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Class ScheduleRepository
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ORM
 */
class ScheduleRepository extends EntityRepository
{

    public function findByRange(DateRangeInterface $range, Office $office, User $user)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 's';
        $params  = ['start' => $range->getFrom(), 'end' => $range->getTo(), 'office' => $office, 'user'=>$user];

        $qb = $builder->select($alias)
            ->from(Schedule::clazz(), $alias)
            ->where("$alias.start > :start AND $alias.end < :end AND $alias.user = :user AND $alias.office = :office")
            ->orderBy($alias.'.start')
            ->setParameters($params);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param \DateTime $date
     * @param Office    $office
     * @param User      $user
     *
     * @return Schedule|null
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByDate($date, $office, $user)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params  = ['date' => $date, 'office' => $office, 'user'=>$user];

        $qb = $builder->select('s')
            ->from(Schedule::clazz(), 's')
            ->where("s.start <= :date AND s.end > :date AND s.user = :user AND s.office = :office")
            ->setMaxResults(1)
            ->setParameters($params);

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * @param \DateTime $date
     * @param Office    $office
     * @param User      $user
     *
     * @return Schedule[]
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByDate($date, $office, $user)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params  = ['date' => $date, 'office' => $office, 'user'=>$user];

        $qb = $builder->select('s')
            ->from(Schedule::clazz(), 's')
            ->where("s.start <= :date AND s.end > :date AND s.user = :user AND s.office = :office")
            ->setMaxResults(1)
            ->setParameters($params);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
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

    public function findByRange(DateRangeInterface $range, Office $office, User $user=null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 's';
        $params  = ['start' => $range->getFrom(), 'end' => $range->getTo(), 'office' => $office];
        $where   = "$alias.start > :start AND $alias.end < :end AND $alias.office = :office";
        if ($user) {
            $params['user'] = $user;
            $where .= " AND $alias.user = :user";
        }
        $qb = $builder->select($alias)
            ->from(Schedule::clazz(), $alias)
            ->where($where)
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

    /**
     * @param \DateTime $date
     * @param Office    $office
     *
     * @return Schedule[]
     */
    public function findSchedulesByDate($date, $office)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params  = ['date' => $date, 'office' => $office];

        $qb = $builder->select('s')
            ->from(Schedule::clazz(), 's')
            ->where("s.start <= :date AND s.end > :date AND s.office = :office")
            ->setParameters($params);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
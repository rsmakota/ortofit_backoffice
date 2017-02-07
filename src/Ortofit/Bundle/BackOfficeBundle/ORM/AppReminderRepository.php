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
    
    private function getBuilder()
    {
        return $this->getEntityManager()->createQueryBuilder();
    }

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
        $builder = $this->getBuilder();
        $params  = ['date' => $date, 'processed' => $processed];

        $qb = $builder->select('a')
            ->from(AppReminder::class, 'a')
            ->where("a.dateTime <= :date AND a.processed = :processed")
            ->setMaxResults($limit)
            ->orderBy('a.dateTime', 'ASC')
            ->setParameters($params);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * @param \DateTime $date
     * @param boolean   $processed
     *
     * @return integer
     */
    public function countByDate($date, $processed)
    {
        $builder = $this->getBuilder();
        $params  = ['date' => $date, 'processed' => $processed];
        $qb = $builder->select('COUNT(a)')
            ->from(AppReminder::class, 'a')
            ->where("a.dateTime <= :date AND a.processed = :processed")
            ->setParameters($params);

        return $qb->getQuery()->getSingleScalarResult();
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
        $builder = $this->getEntityManager()->createQueryBuilder();
        $criteria['msisdn'] = '%'.$msisdn.'%';
        $qb = $builder->select('c')
            ->from(AppReminder::class, 'c')
            ->join('c.person', 'p')
            ->join('p.client', 'client')
            ->where('client.msisdn LIKE :msisdn')
            ->andWhere("c.processed = :processed")
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->setParameters($criteria);

        if (null != $orderBy) {
            $field = key($orderBy);
            $builder->orderBy('c.'.$field, $orderBy[$field]);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param string $msisdn
     * @param array  $params
     *
     * @return integer
     */
    public function countLikeMsisdn($msisdn, array $params)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $params['msisdn'] = '%'.$msisdn.'%';
        $qb = $builder->select('COUNT(c)')
            ->from(AppReminder::class, 'c')
            ->join('c.person', 'p')
            ->join('p.client', 'client')
            ->where('client.msisdn LIKE :msisdn')
            ->andWhere("c.processed = :processed")

            ->setParameters($params);

        return $qb->getQuery()->getSingleScalarResult();
    }


}
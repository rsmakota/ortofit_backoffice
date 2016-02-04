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

class ScheduleRepository extends EntityRepository
{

    public function findByRange(\DateTime $dayFrom, \DateTime $dayTo, Office $office, User $user)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 's';
        $params  = ['start' => $dayFrom, 'end' => $dayTo, 'office' => $office, 'user'=>$user];

        $qb = $builder->select($alias)
            ->from(Schedule::clazz(), $alias)
            ->where("$alias.start > :start AND $alias.end < :end AND $alias.user = :user AND $alias.office = :office")
            ->setParameters($params);

        return $qb->getQuery()->getResult();
    }
}
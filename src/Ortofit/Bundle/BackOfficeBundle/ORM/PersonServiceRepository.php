<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Ortofit\Bundle\BackOfficeBundle\Entity\Insole;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\PersonService;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;

/**
 * Class PersonServiceRepository
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ORM
 */
class PersonServiceRepository extends EntityRepository
{
    /**
     * @param DateRangeInterface $range
     * @param Office|null        $office
     * @param User|null          $user
     *
     * @return array
     */
    public function getUserServices(DateRangeInterface $range, Office $office, User $user)
    {
        $params  = ['dayFrom' => $range->getFrom(), 'dayTo' => $range->getTo(), 'office' => $office, 'user'=>$user];
        $builder = $this->getEntityManager()->createQueryBuilder();
        $builder->select('SUM(ps.number) as c')
            ->addSelect('s as service')
            ->from(PersonService::class, 'ps')
            ->join(Appointment::class, 'a', Join::WITH, 'ps.appointment = a')
            ->join(User::class, 'u', Join::WITH, 'a.user = u' )
            ->join(Service::class, 's', Join::WITH, 'ps.service = s')
            ->andWhere('a.dateTime > :dayFrom AND a.dateTime < :dayTo AND u=:user AND a.office=:office')
            ->groupBy('s')
            ->setParameters($params);

        return $builder->getQuery()->getResult();
    }

    public function getUserInOffice(DateRangeInterface $range, Office $office)
    {
        $params  = ['dayFrom' => $range->getFrom(), 'dayTo' => $range->getTo(), 'office' =>$office];
        $builder = $this->getEntityManager()->createQueryBuilder();
        $builder->select('u')
            ->from(PersonService::class, 'ps')
            ->join(Appointment::class, 'a', Join::WITH, 'ps.appointment = a')
            ->join(User::class, 'u', Join::WITH, 'a.user = u' )
            ->join(Service::class, 's', Join::WITH, 'ps.service = s')
            ->andWhere('a.dateTime > :dayFrom AND a.dateTime < :dayTo AND a.office=:office')
            ->groupBy('u')
            ->setParameters($params);

        return $builder->getQuery()->getResult();
    }

    public function getInsoles(DateRangeInterface $range, Office $office, User $user)
    {
        $params  = ['dayFrom' => $range->getFrom(), 'dayTo' => $range->getTo(), 'office' => $office, 'user' => $user];
        $builder = $this->getEntityManager()->createQueryBuilder();
        $builder->select('COUNT(1) as c')
            ->addSelect('it as type')
            ->from(Insole::class, 'i')
            ->join(InsoleType::class, 'it', Join::WITH, 'i.type = it')
            ->join(Appointment::class, 'a', Join::WITH, 'i.appointment = a')
            ->join(User::class, 'u', Join::WITH, 'a.user = u' )
            ->andWhere('a.dateTime > :dayFrom AND a.dateTime < :dayTo AND u=:user AND a.office=:office')
            ->groupBy('it')
            ->setParameters($params);

        return $builder->getQuery()->getResult();
    }
}
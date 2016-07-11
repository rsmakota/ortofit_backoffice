<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;

use Doctrine\ORM\EntityRepository;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Rsmakota\UtilityBundle\Date\DateRange;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;

/**
 * Class AppointmentRepository
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ORM
 */
class AppointmentRepository extends EntityRepository
{
    /**
     * @param array  $params
     * @param string $alias
     *
     * @return string
     */
    private function getWhereAndCondition(array $params, $alias)
    {
        if (empty($params)) {
            return '';
        }
        $keys = array_keys($params);
        $data = [];
        foreach ($keys as $key) {
            $data[] = $alias.'.'.$key.' = :'.$key;
        }

        return implode(' AND ', $data);
    }
    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return array
     */
    public function findByRange(DateRangeInterface $range, Office $office=null, User $user = null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 'a';
        $params  = ['dayFrom' => $range->getFrom(), 'dayTo' => $range->getTo()];
        $extra   = [];
        if ($user) {
            $extra['user'] = $user;
        }
        if ($office) {
            $extra['office'] = $office;
        }
        $qb = $builder->select($alias)
            ->from(Appointment::clazz(), $alias)
            ->where("$alias.dateTime > :dayFrom AND $alias.dateTime < :dayTo")
            ->andWhere($this->getWhereAndCondition($extra, $alias))
            ->setParameters(array_merge($params, $extra));

        return $qb->getQuery()->getResult();
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     * @return integer
     */
    public function countByRange(DateRangeInterface $range, Office $office=null, User $user = null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 'a';
        $params  = ['dayFrom' => $range->getFrom(), 'dayTo' => $range->getTo()];
        $extra   = ['office' => $office];
        if ($user) {
            $extra['user'] = $user;
        }
        if ($office) {
            $extra['office'] = $office;
        }
        $qb = $builder->select('COUNT('.$alias.')')
            ->from(Appointment::clazz(), $alias)
            ->where("$alias.dateTime > :dayFrom AND $alias.dateTime < :dayTo")
            ->andWhere($this->getWhereAndCondition($extra, $alias))
            ->setParameters(array_merge($params, $extra));

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param Client $client
     *
     * @return integer
     */
    public function countByClient(Client $client)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 'a';
        $qb = $builder->select('COUNT('.$alias.')')
            ->from(Appointment::clazz(), $alias)
            ->where("a.client=:client")
            ->setParameter('client', $client);

        return $qb->getQuery()->getSingleScalarResult();
    }

}
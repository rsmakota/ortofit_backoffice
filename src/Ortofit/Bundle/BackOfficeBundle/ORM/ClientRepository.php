<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;


use Doctrine\ORM\EntityRepository;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;

/**
 * Class ClientRepository
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ORM
 */
class ClientRepository extends EntityRepository
{
    /**
     * @param array $keys
     *
     * @return string
     */
    private function getLikeWhere(array $keys)
    {
        $where = [];
        foreach ($keys as $key) {
            $where[] = 'c.'.$key.' LIKE :'.$key;
        }

        return implode(' AND ', $where);
    }

    /**
     * @param array      $criteria
     * @param array|null $orderBy  ["fieldName" => "DESC/ASC"]
     * @param null       $limit
     * @param null       $offset
     *
     * @return Client[]
     */
    public function findLike(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $fields  = array_keys($criteria);

        $qb = $builder->select('c')
            ->from(Client::clazz(), 'c')
            ->where($this->getLikeWhere($fields))
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
     * @param array $criteria
     *
     * @return integer
     */
    public function countLike($criteria)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $fields  = array_keys($criteria);

        $qb = $builder->select('COUNT(c)')
            ->from(Client::clazz(), 'c')
            ->where($this->getLikeWhere($fields))
            ->setParameters($criteria);

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param DateRangeInterface $range
     * @param ClientDirection $clientDirection
     * @return integer
     */
    public function countNewByDirection(DateRangeInterface $range, ClientDirection $clientDirection)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $alias   = 'a';
        $params  = [
            'dayFrom'         => $range->getFrom(),
            'dayTo'           => $range->getTo(),
            'clientDirection' => $clientDirection
        ];

        $qb = $builder->select('COUNT('.$alias.')')
            ->from(Client::clazz(), $alias)
            ->where("
                $alias.created > :dayFrom AND 
                $alias.created < :dayTo AND
                $alias.clientDirection = :clientDirection
            ")
            ->setParameters($params);

        return $qb->getQuery()->getSingleScalarResult();
    }
}
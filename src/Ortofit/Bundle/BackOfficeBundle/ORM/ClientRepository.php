<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\ORM;


use Doctrine\ORM\EntityRepository;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;

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
     * @param array|null $orderBy
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
}
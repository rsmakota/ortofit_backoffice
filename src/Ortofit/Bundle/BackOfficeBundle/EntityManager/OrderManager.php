<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Application;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Order;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class OrderManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class OrderManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Order::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'order_manager';
    }

    /**
     * @param ParameterBag $params
     *
     * @return object
     */
    public function create($params)
    {
        /** @var Application $application */
        /** @var Client      $client      */
        $application = $this->rGet($params->get('applicationId'));
        $client      = $this->rGet($params->get('clientId'));
        $entity      = new Order();
        $entity->setApplication($application);
        $entity->setClient($client);

        $this->persist($entity);
    }

    /**
     * @param ParameterBag $params
     *
     * @return boolean
     */
    public function update($params)
    {
        /** @var Application $application */
        /** @var Client      $client      */
        /** @var Order       $entity      */
        $application = $this->rGet($params->get('applicationId'));
        $client      = $this->rGet($params->get('clientId'));
        $entity      = $this->rGet($params->get('id'));
        $entity->setApplication($application);
        $entity->setClient($client);

        $this->merge($entity);
    }

    /**
     * @param integer $limit
     * @return Order[]
     */
    public function findNonProcessed($limit)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findBy(
            ['processed' => false],
            null,
            $limit
        );
    }

    /**
     * @return integer
     */
    public function countUnprocessed()
    {
        $builder = $this->enManager->createQueryBuilder();
        $params  = [ 'processed' => false];
        $qb      = $builder->select('COUNT(o)')
            ->from(Order::clazz(), 'o')
            ->where("o.processed = :processed")
            ->setParameters($params);

        return $qb->getQuery()->getSingleScalarResult();
    }
}
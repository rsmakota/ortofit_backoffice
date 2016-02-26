<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Ortofit\Bundle\BackOfficeBundle\Entity\EntityInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ClientManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ClientManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Client::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'client_manager';
    }


    /**
     * @param array        $params
     * @param array|null   $orderBy
     * @param integer|null $limit
     * @param integer|null $offset
     *
     * @return EntityInterface[]
     */
    public function findLike($params, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findLike($params, $orderBy, $limit, $offset);
    }

    /**
     * @param array $criteria
     *
     * @return integer
     */
    public function countLike(array $criteria)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countLike($criteria);
    }
}
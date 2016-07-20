<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;
use Ortofit\Bundle\BackOfficeBundle\Entity\EntityInterface;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Client\ClientModel;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;
use Rsmakota\UtilityBundle\Date\DateRange;
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
        if ($limit < 0 || $offset < 0) {
            return [];
        }
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

    /**
     * @param DateRange       $range
     * @param ClientDirection $clientDirection
     */
    public function countNewByDirection(DateRange $range, ClientDirection $clientDirection)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countNewByDirection($range, $clientDirection);
    }
    
    /**
     * @param ModelInterface $model
     *
     * @return Client
     */
    public function createByModel($model)
    {
        /** @var ClientModel $model */
        $client = new Client();
        $client->setMsisdn($model->msisdn);
        $client->setName($model->name);
        $client->setGender($model->gender);
        $client->setClientDirection($this->enManager->getReference(ClientDirection::clazz(), $model->clientDirectionId));
        $client->setCountry($this->enManager->getReference(Country::clazz(), $model->countryId));

        $this->persist($client);

        return $client;
    }
    /**
     * @param Client         $client
     * @param ModelInterface $model
     *
     * @return Client
     */
    public function updateByModel($client, $model)
    {
        /** @var ClientModel $model */
        $client->setMsisdn($model->msisdn);
        $client->setName($model->name);
        $client->setGender($model->gender);
        $client->setClientDirection($this->enManager->getReference(ClientDirection::clazz(), $model->clientDirectionId));
        $client->setCountry($this->enManager->getReference(Country::clazz(), $model->countryId));

        $this->merge($client);

        return $client;
    }
}
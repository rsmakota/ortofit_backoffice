<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\SingUpBundle\Service;

use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

/**
 * Class ClientManager
 *
 * @package Ortofit\Bundle\SingUpBundle\Service
 */
class ClientManager extends AbstractManager
{
    /**
     * @param string $msisdn
     *
     * @return Client|null
     */
    public function findByMsisdn($msisdn)
    {
        return $this->enManager->getRepository(Client::class)->findOneBy([self::PARAM_MSISDN => $msisdn]);
    }

    /**
     * @param ParameterBag $bag
     *
     * @return Client
     * @throws \Exception
     */
    public function create($bag)
    {
        $client = new Client();
        $client->setMsisdn($bag->get(self::PARAM_MSISDN));
        $client->setCountry($bag->get(self::PARAM_COUNTRY));
        $client->setClientDirection($bag->get(self::PARAM_DIRECTION));
        $this->enManager->persist($client);
        $this->enManager->flush();

        return $client;
    }
}
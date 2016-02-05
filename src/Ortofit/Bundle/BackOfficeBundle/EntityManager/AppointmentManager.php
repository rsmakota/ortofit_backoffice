<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class AppointmentManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class AppointmentManager extends AbstractManager
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'appointment_manager';
    }

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Appointment::clazz();
    }

    protected function getClient($id)
    {
        $client = $this->enManager->getRepository(Client::clazz())->find($id);
        if ($client) {
            return $client;
        }

        throw new \Exception('Can\'t find Client by id');
    }

    /**
     * @param ParameterBag $params
     *
     * @return Appointment
     */
    public function create($params)
    {
        $entity = new Appointment();
        $entity->setClient($params->get('client'));
        $entity->setDateTime($params->get('dateTime'));
        $entity->setDuration($params->get('duration'));
        $entity->setOffice($params->get('office'));
        $entity->setDescription($params->get('description'));
        $entity->setService($params->get('service'));
        $entity->setState($params->get('state', Appointment::STATE_NEW));
        $entity->setUser($params->get('user'));
        $this->persist($entity);

        return $entity;
    }


    /**
     * @param ParameterBag $params
     *
     * @return boolean
     * @throws \Exception
     */
    public function update($params)
    {
        /** @var Appointment $entity */
        $entity = $this->rGet($params->get('id'));
        $entity->setDateTime($params->get('dateTime'));
        $entity->setClient($params->get('client'));
        $entity->setDuration($params->get('duration'));
        $entity->setDescription($params->get('description'));
        $entity->setService($params->get('service'));
        $entity->setState($params->get('state'));
        $entity->setUser($params->get('user'));
        $this->merge($entity);

        return true;
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param null|User          $user
     *
     * @return Appointment[]
     */
    public function findByRange($range, $office, $user)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->findByRange(
            $range,
            $office,
            $user
        );
    }
}
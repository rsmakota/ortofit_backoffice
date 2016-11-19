<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Person;
use Ortofit\Bundle\BackOfficeBundle\Entity\PersonService;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class PersonManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class PersonServiceManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return PersonService::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'person_manager';
    }

    /**
     * @param ParameterBag $params
     *
     * @return PersonService
     */
    public function create($params)
    {
        /**
         * @var Appointment $app
         * @var Person      $person
         * @var Service     $service
         */
        $entity  = new PersonService();
        $app     = $params->get('appointment');
        $person  = $params->get('person');
        $service = $params->get('service');
        $entity->setAppointment($app);
        $entity->setClient($app->getClient());
        $entity->setDate($app->getDateTime());
        $entity->setPerson($person);
        $entity->setService($service);
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
        /**
         * @var PersonService $entity
         * @var Appointment   $app
         * @var Person        $person
         * @var Service       $service
         */
        $entity  = $this->rGet($params->get('id'));
        $app     = $params->get('appointment');
        $person  = $params->get('person');
        $service = $params->get('service');
        $entity->setAppointment($app);
        $entity->setClient($app->getClient());
        $entity->setDate($app->getDateTime());
        $entity->setPerson($person);
        $entity->setService($service);
        $this->merge($entity);
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return array
     */
    public function getUserServices(DateRangeInterface $range, Office $office, User $user)
    {

        return $this->enManager->getRepository($this->getEntityClassName())->getUserServices(
            $range,
            $office,
            $user
        );
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     *
     * @return User[]
     */
    public function getUsersInOffice(DateRangeInterface $range, Office $office)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->getUserInOffice(
            $range,
            $office
        );
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return array
     */
    public function getInsoles(DateRangeInterface $range, Office $office, User $user)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->getInsoles(
            $range,
            $office,
            $user
        );
    }
}
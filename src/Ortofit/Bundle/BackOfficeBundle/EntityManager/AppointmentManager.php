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
        return Appointment::class;
    }

    protected function getClient($id)
    {
        $client = $this->enManager->getRepository(Client::class)->find($id);
        if ($client) {
            return $client;
        }

        throw new \Exception('Can\'t find Client by id');
    }

    /**
     * @param Appointment $entity
     */
    public function success($entity)
    {
        $entity->setState(Appointment::STATE_SUCCESS);
        $this->merge($entity);
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
    
    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param null|User          $user
     *
     * @return integer
     */
    public function countByRange(DateRangeInterface $range, Office $office=null, User $user = null)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countByRange(
            $range,
            $office,
            $user
        );
    }

    /**
     * @param Client $client
     *
     * @return integer
     */
    public function countByClient(Client $client)
    {
        return $this->enManager->getRepository($this->getEntityClassName())->countByClient($client);
    }
    /**
     * @param Appointment $app
     * @param Office      $office
     * @param \DateTime   $date
     */
    public function move($app, $office, $date)
    {
        $app->setOffice($office);
        $app->setDateTime($date);
        $this->merge($app);

    }
}
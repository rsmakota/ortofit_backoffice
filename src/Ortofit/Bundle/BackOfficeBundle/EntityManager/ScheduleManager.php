<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Rsmakota\UtilityBundle\Date\DateRangeInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class ServiceManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class ScheduleManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Schedule::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'schedule_manager';
    }

    /**
     * @param ParameterBag $params
     *
     * @return object
     */
    public function create($params)
    {
        $entity = new Schedule();
        $entity->setUser($params->get('user'));
        $entity->setOffice($params->get('office'));
        $entity->setStart($params->get('startHour'));
        $entity->setEnd($params->get('endHour'));

        $this->persist($entity);

        return $entity;
    }

    /**
     * @param ParameterBag $params
     *
     * @return boolean
     */
    public function update($params)
    {
        $entity = $this->rGet($params->get('id'));
        $entity->setUser($params->get('user'));
        $entity->setOffice($params->get('office'));
        $entity->setStart($params->get('startHour'));
        $entity->setEnd($params->get('endHour'));
        $this->merge($entity);

        return true;
    }

    /**
     * @param DateRangeInterface $range
     * @param Office             $office
     * @param User               $user
     *
     * @return Schedule[]
     */
    public function findByRange(DateRangeInterface $range, Office $office, User $user)
    {

        return $this->enManager->getRepository($this->getEntityClassName())->findByRange(
            $range,
            $office,
            $user
        );
    }
}
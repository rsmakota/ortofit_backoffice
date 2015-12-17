<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\SingUpBundle\Entity\Diagnosis;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class DiagnosisManager
 *
 * @package Ortofit\Bundle\BackOfficeBundle\ObjectManager
 */
class DiagnosisManager extends AbstractManager
{

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return Diagnosis::clazz();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'diagnosis_manager';
    }

    /**
     * @param ParameterBag $params
     *
     * @return object
     */
    public function create($params)
    {
        $entity = new Diagnosis();
        $entity->setDescription($params->get('description'));
        $entity->setPerson($params->get('person'));
        $this->persist($entity);
    }

    /**
     * @param ParameterBag $params
     *
     * @return boolean
     */
    public function update($params)
    {
        /** @var Diagnosis $entity */
        $entity = $this->rGet($params->get('id'));
        $entity->setDescription($params->get('description'));
        $entity->setPerson($params->get('person'));
        $this->merge($entity);
    }
}
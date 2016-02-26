<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\EntityManager;

use Ortofit\Bundle\BackOfficeBundle\Entity\Diagnosis;
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

}
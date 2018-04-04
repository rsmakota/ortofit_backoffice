<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;

/**
 * Class LoadCountyData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadInsoleTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $insoleTypes = [
            'child'     => 'Детские',
            'casual'    => 'Повседневные',
            'sport'     => 'Спортивные',
            'designer'  => 'Для модельной обуви',
            'heel_spur' => 'Под пяточную шпору',
            'diabetic'  => 'Для диабетической стопы'

        ];

        foreach ($insoleTypes as $alias=>$name) {
            $entity = new InsoleType();
            $entity->setName($name);
            $entity->setAlias($alias);
            $manager->persist($entity);
            $this->addReference('insoleTypes:'.$alias, $entity);
        }

        $manager->flush();


    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 100;
    }
}
<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\FamilyStatus;

/**
 * Class LoadFamilyStatusData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadFamilyStatusData extends AbstractFixture implements OrderedFixtureInterface
{
    private $generalStatuses = [
        'son'      => 'сын',
        'daughter' => 'дочь',
        'husband'  => 'муж',
        'wife'     => 'жена',
        'self'     => 'он(а) же'
    ];
    private $extendedStatuses = [
        'mother' => 'мать',
        'father' => 'отец',
        'nephew' => 'племянник',
        'niece'  => 'племянница'
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach ($this->generalStatuses as $alias => $name) {
            $entity = new FamilyStatus();
            $entity->setName($name);
            $entity->setAlias($alias);
            $entity->setGeneral(true);
            $entity->setPosition($i);
            $manager->persist($entity);
            $this->addReference('status:' . $alias, $entity);
            $i++;
        }

        foreach ($this->extendedStatuses as $alias => $name) {
            $entity = new FamilyStatus();
            $entity->setName($name);
            $entity->setAlias($alias);
            $entity->setGeneral(false);
            $entity->setPosition($i);
            $manager->persist($entity);
            $i++;
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
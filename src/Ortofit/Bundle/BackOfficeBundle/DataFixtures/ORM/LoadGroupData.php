<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;


/**
 * Class LoadUserData
 *
 * @package Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM
 */
class LoadGroupData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $operator = new Group('Operator', ['ROLE_USER']);
        $doctor   = new Group('Doctor', ['ROLE_USER']);
        $admin    = new Group('Admin', ['ROLE_USER', 'ROLE_ADMIN']);

        $manager->persist($operator);
        $manager->persist($doctor);
        $manager->persist($admin);

        $this->addReference('group:operator', $operator);
        $this->addReference('group:doctor', $doctor);
        $this->addReference('group:admin', $admin);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 99;
    }
}
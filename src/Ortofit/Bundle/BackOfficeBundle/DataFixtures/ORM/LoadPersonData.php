<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Person;

/**
 * Class LoadPersonData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadPersonData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $son = new Person();
        $son->setName('Max');
        $son->setBorn(new \DateTime('-30 years'));
        $son->setFamilyStatus($this->getReference('status:son'));
        $son->setClient($this->getReference('client:00'));
        $son->setGender(Client::GENDER_MALE);
        $son->setIsClient(false);
        $manager->persist($son);
        $this->setReference('person:son', $son);

        $daughter = new Person();
        $daughter->setName('Kate');
        $daughter->setBorn(new \DateTime('-35 years'));
        $daughter->setFamilyStatus($this->getReference('status:daughter'));
        $daughter->setClient($this->getReference('client:00'));
        $daughter->setIsClient(false);
        $daughter->setGender(Client::GENDER_FEMALE);
        $manager->persist($daughter);
        $this->setReference('person:daughter', $daughter);

        $husband = new Person();
        $husband->setName('John');
        $husband->setBorn(new \DateTime('-28 years'));
        $husband->setFamilyStatus($this->getReference('status:husband'));
        $husband->setClient($this->getReference('client:00'));
        $husband->setIsClient(false);
        $husband->setGender(Client::GENDER_MALE);
        $manager->persist($husband);
        $this->setReference('person:husband', $husband);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 140;
    }
}
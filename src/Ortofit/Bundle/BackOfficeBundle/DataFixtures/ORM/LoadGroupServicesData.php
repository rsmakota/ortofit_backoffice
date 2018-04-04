<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2017 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\ServiceGroup;

/**
 * Class LoadGroupServices
 *
 * @package Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM
 */
class LoadGroupServicesData extends AbstractFixture implements OrderedFixtureInterface
{

    private $data = [
        ['name' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE, 'alias' =>ServiceGroup::SERVICE_GROUP_ALIAS_BASE],
        ['name' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE, 'alias' =>ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE]
    ];
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 100;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $groupData) {
            $group = new ServiceGroup();
            $group->setName($groupData['name']);
            $group->setAlias($groupData['alias']);
            $manager->persist($group);
            $this->addReference('serviceGroup:'.$groupData['alias'], $group);
        }

        $manager->flush();
    }
}
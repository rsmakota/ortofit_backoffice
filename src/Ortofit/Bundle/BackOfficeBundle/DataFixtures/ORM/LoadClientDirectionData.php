<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;

/**
 * Class LoadClientSourceData
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadClientDirectionData extends AbstractFixture implements OrderedFixtureInterface
{
    private $sources = [
        'unknown'  => 'Не определен',
        'internet' => 'Интернет',
        'bord'     => 'Наружная реклама',
        'friends'  => 'Посоветовали знакомы',
        'return'   => 'Повторно',

    ];
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $i = 1;
        foreach($this->sources as $key => $name) {
            $source = new ClientDirection();
            $source->setName($name);
            $source->setAlias($key);
            $source->setOrderNum($i);
            $manager->persist($source);
            $this->addReference('clientDirection:'.$key, $source);
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
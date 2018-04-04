<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;

/**
 * Class LoadCountyData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadReason extends AbstractFixture implements OrderedFixtureInterface
{

    private $data = [
        "Заболели"            => "sick",
        "Не берут трубку"     => "not_available",
        "Передумали"          => "not_available",
        "Пошли к конкурентам" => "competitors",
        "Другое"              => "other"
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
         foreach ($this->data as $name=>$reason) {
             $closeReason = new Reason();
             $closeReason->setName($name);
             $closeReason->setAlias($reason);
             $closeReason->setType(Reason::TYPE_CLOSE);
             
             $manager->persist($closeReason);
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
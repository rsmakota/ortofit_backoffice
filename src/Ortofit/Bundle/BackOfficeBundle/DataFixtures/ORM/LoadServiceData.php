<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;

/**
 * Class LoadServiceData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadServiceData extends AbstractFixture implements OrderedFixtureInterface
{

    private $data = [
        'Консультации'             => ['alias' => 'consult',      'color' => '#3c8dbc', 'short'=>'(Конс.)'],
        'Коррекция стелек '        => ['alias' => 'correction',   'color' => '#ff7000', 'short'=>'(КС)'],
        'Изготовление стелек'      => ['alias' => 'insoles',      'color' => '#cd853f', 'short'=>'(ИОС)'],
        'Массаж'                   => ['alias' => 'massage',      'color' => '#ff69b4', 'short'=>'(Массаж)'],
        'Компьютерная диагностика' => ['alias' => 'diagnostic',   'color' => '#008d4c', 'short'=>'(КД)'],
        'Бесплатная консультация'  => ['alias' => 'free_consult', 'color' => '#4876ff', 'short'=>'(б/п конс)'],
    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $name => $data) {
            $entity = new Service();
            $entity->setName($name);
            $entity->setColor($data['color']);
            $entity->setShort($data['short']);
            $manager->persist($entity);
            $this->setReference('service:'.$data['alias'], $entity);
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
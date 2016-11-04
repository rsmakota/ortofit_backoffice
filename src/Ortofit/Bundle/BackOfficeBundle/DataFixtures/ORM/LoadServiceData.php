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
        'Консультации' => ['alias' => Service::ALIAS_CONSULTATION, 'color' => '#3c8dbc', 'short' => '(Конс.)'],
        'Коррекция стелек ' => ['alias' => Service::ALIAS_INSOLES_CORRECTION, 'color' => '#ff7000', 'short' => '(КС)'],
        'Изготовление стелек' => [
            'alias' => Service::ALIAS_INSOLES_MANUFACTURING,
            'color' => '#cd853f',
            'short' => '(ИОС)'
        ],
        'Массаж' => ['alias' => Service::ALIAS_MASSAGE, 'color' => '#ff69b4', 'short' => '(Массаж)'],
        'Компьютерная диагностика' => [
            'alias' => Service::ALIAS_PC_DIAGNOSTIC,
            'color' => '#008d4c',
            'short' => '(КД)'
        ],
        'Бесплатная консультация' => [
            'alias' => Service::ALIAS_FREE_CONSULTATION,
            'color' => '#4876ff',
            'short' => '(б/п конс)'
        ],
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
            $entity->setAlias($data['alias']);
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
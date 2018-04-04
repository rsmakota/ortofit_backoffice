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
use Ortofit\Bundle\BackOfficeBundle\Entity\ServiceGroup;

/**
 * Class LoadServiceData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadServiceData extends AbstractFixture implements OrderedFixtureInterface
{

    static private $data = [
        'Консультации'             => [
            'alias' => Service::ALIAS_CONSULTATION,
            'color' => '#ff7514',
            'short' => '(Конс.)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Коррекция стелек '        => [
            'alias' => Service::ALIAS_INSOLES_CORRECTION,
            'color' => '#a6625b',
            'short' => '(КС)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Изготовление стелек'      => [
            'alias' => Service::ALIAS_INSOLES_MANUFACTURING,
            'color' => '#bf7C26',
            'short' => '(ИОС)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Массаж'                   => [
            'alias' => Service::ALIAS_MASSAGE,
            'color' => '#c93c20',
            'short' => '(Массаж)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Компьютерная диагностика' => [
            'alias' => Service::ALIAS_PC_DIAGNOSTIC,
            'color' => '#d2722d',
            'short' => '(КД)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Бесплатная консультация'  => [
            'alias' => Service::ALIAS_FREE_CONSULTATION,
            'color' => '#ecc384',
            'short' => '(б/п конс)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Кинезиотейпирование'      => [
            'alias' => Service::ALIAS_KINESIO_TAPING,
            'color' => '#8E402A',
            'short' => '(KT)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_BASE,
        ],
        'Массаж детский + лечебная гимнастика' => [
            'alias' => Service::ALIAS_MASSAGE_CHILD_HEALTHY_GYM,
            'color' => '#c93c20',
            'short' => '(Д+ЛГ)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],
        'Кинезиотерапия' => [
            'alias' => Service::ALIAS_KINESIOTERAPY,
            'color' => '#c93c20',
            'short' => '(КТ-я)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],
        'Кинезиомассаж детский' => [
            'alias' => Service::ALIAS_KINESIO_MASSAGE_CHILD,
            'color' => '#c93c20',
            'short' => '(КМ)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],
        'Массаж антицеллюлитный' => [
            'alias' => Service::ALIAS_MASSAGE_ANTI_CELLULITE,
            'color' => '#c93c20',
            'short' => '(АЦ)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],
        'Массаж стоп' => [
            'alias' => Service::ALIAS_FOOT_MASSAGE,
            'color' => '#c93c20',
            'short' => '(Cтоп)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],
        'Лечебный массаж спины' => [
            'alias' => Service::ALIAS_BACK_MASSAGE,
            'color' => '#c93c20',
            'short' => '(ЛМС)',
            'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
        ],


    ];

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $groups = [
            ServiceGroup::SERVICE_GROUP_ALIAS_BASE    => $this->getReference('serviceGroup:'.ServiceGroup::SERVICE_GROUP_ALIAS_BASE),
            ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE => $this->getReference('serviceGroup:'.ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE)
        ];
        foreach (self::$data as $name => $data) {
            $entity = new Service();
            $entity->setName($name);
            $entity->setColor($data['color']);
            $entity->setShort($data['short']);
            $entity->setAlias($data['alias']);
            $entity->setServiceGroup($groups[$data['group']]);
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
        return 120;
    }
}
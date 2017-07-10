<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Doctrine\ORM\EntityManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\FamilyStatus;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\ServiceGroup;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceGroupManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;


class ModifyDataCommand extends ContainerAwareCommand
{

    /**
     * @return EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
    }

    /**
     * @return object|\Ortofit\Bundle\BackOfficeBundle\EntityManager\ServiceManager
     */
    private function getServiceManager()
    {
        return $this->getContainer()->get('ortofit_back_office.service_manage');
    }

    /**
     */
    protected function configure()
    {
        $this
            ->setName('backoffice:modify:data')
            ->setDescription('This command modifies data for realise')
            ->setHelp(
                <<<EOT
                The <info>backoffice:modify:data</info> modifies data for realise.
EOT
            );
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getManager();

        $massageGroup = $manager->getRepository(ServiceGroup::class)->findOneBy(['alias' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE]);

        $massageServicesData = [
            'ЛФК - одно занятие' => [
                'alias' => Service::ALIAS_MASSAGE_CHILD_HEALTHY_GYM,
                'color' => '#c93c20',
                'short' => '(ЛФК)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ],
            'Массаж спины детский (до 11 лет)' => [
                'alias' => Service::ALIAS_MASSAGE_CHILD_HEALTHY_GYM,
                'color' => '#c93c20',
                'short' => '(МС<11)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ],
            'Массаж спины (с 12 лет)' => [
                'alias' => Service::ALIAS_MASSAGE_CHILD_HEALTHY_GYM,
                'color' => '#c93c20',
                'short' => '(МС>12)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ],
            'Массаж детский общий (с 10 лет до 16 лет)' => [
                'alias' => Service::ALIAS_MASSAGE_CHILD_HEALTHY_GYM,
                'color' => '#c93c20',
                'short' => '(МДО<16)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ],
            'Общий массаж + мануальная терапия' => [
                'alias' => Service::ALIAS_BACK_MASSAGE,
                'color' => '#c93c20',
                'short' => '(ОМ+МТ)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ],
            'Массаж плечевого пояса + верхних конечностей' => [
                'alias' => Service::ALIAS_BACK_MASSAGE,
                'color' => '#c93c20',
                'short' => '(МПВК)',
                'group' => ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE,
            ]
        ];

        foreach ($massageServicesData as $name => $massageData) {
            $massage = new Service();
            $massage->setServiceGroup($massageGroup);
            $massage->setAlias($massageData['alias']);
            $massage->setColor($massageData['color']);
            $massage->setShort($massageData['short']);
            $massage->setName($name);
            $manager->persist($massage);
        }
        $manager->flush();
    }
}
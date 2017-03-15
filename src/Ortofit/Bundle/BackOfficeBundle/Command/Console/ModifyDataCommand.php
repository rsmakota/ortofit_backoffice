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
        $baseGroup = new ServiceGroup();
        $baseGroup->setAlias(ServiceGroup::SERVICE_GROUP_ALIAS_BASE);
        $baseGroup->setName(ServiceGroup::SERVICE_GROUP_ALIAS_BASE);
        $manager->persist($baseGroup);

        $baseMassageGroup = new ServiceGroup();
        $baseMassageGroup->setAlias(ServiceGroup::SERVICE_GROUP_ALIAS_BASE_MASSAGE);
        $baseMassageGroup->setName(ServiceGroup::SERVICE_GROUP_ALIAS_BASE_MASSAGE);
        $manager->persist($baseMassageGroup);

        $massageGroup = new ServiceGroup();
        $massageGroup->setName(ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE);
        $massageGroup->setAlias(ServiceGroup::SERVICE_GROUP_ALIAS_MASSAGE);
        $manager->persist($massageGroup);

        $manager->flush();
        /** @var Service[] $services */
        $services = $this->getServiceManager()->all();
        foreach ($services as $service) {
            if ($service->getAlias() === Service::ALIAS_MASSAGE) {
                $service->setServiceGroup($baseMassageGroup);
            } else {
                $service->setServiceGroup($baseGroup);
            }
            $manager->merge($service);
        }
        $manager->flush();

        $massageServicesData = [
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
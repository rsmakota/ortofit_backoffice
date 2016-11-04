<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\InsoleType;
use Ortofit\Bundle\BackOfficeBundle\Entity\Reason;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
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
        $serviceAliases = [
            Service::ALIAS_CONSULTATION,            //1	Консультации
            Service::ALIAS_INSOLES_CORRECTION,        //2	Коррекция стелек
            Service::ALIAS_INSOLES_MANUFACTURING,        //3	Изготовление стелек
            Service::ALIAS_MASSAGE,        //4	Массаж
            Service::ALIAS_PC_DIAGNOSTIC,        //5	Компьютерная диагностика
            Service::ALIAS_FREE_CONSULTATION                    //6	Бесплатная консультация
        ];
        $id = 1;
        $eManager = $this->getManager();
        foreach ($serviceAliases as $alias) {
            $service = $eManager->getRepository(Service::class)->find($id);
            $service->setAlias($alias);
            $eManager->merge($service);
            $id ++;
        }

        $insoleTypes = [
            'child'     => 'Детские',
            'casual'    => 'Повседневные',
            'sport'     => 'Спортивные',
            'designer'  => 'Для модельной обуви',
            'heel_spur' => 'Под пяточную шпору',
            'diabetic'  => 'Для диабетической стопы'

        ];

        foreach ($insoleTypes as $alias=>$name) {
            $entity = new InsoleType();
            $entity->setName($name);
            $entity->setAlias($alias);
            $eManager->persist($entity);
        }

        $eManager->flush();
    }
}
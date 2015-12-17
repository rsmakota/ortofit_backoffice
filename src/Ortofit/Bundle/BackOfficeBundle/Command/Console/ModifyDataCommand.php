<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;


use Ortofit\Bundle\SingUpBundle\Entity\Application;
use Ortofit\Bundle\SingUpBundle\Entity\City;
use Ortofit\Bundle\SingUpBundle\Entity\Client;
use Ortofit\Bundle\SingUpBundle\Entity\ClientDirection;
use Ortofit\Bundle\SingUpBundle\Entity\FamilyStatus;
use Ortofit\Bundle\SingUpBundle\Entity\Office;
use Ortofit\Bundle\SingUpBundle\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{

    private $directionsSources = [
        'internet' => 'Интернет',
        'bord'     => 'Наружная реклама',
        'friends'  => 'Посоветовали знакомы',
        'other'    => 'Другое'
    ];

    private $personStatuses = [
        'son'      => 'сын',
        'daughter' => 'дочь',
        'husband'  => 'муж',
        'wife'     => 'жена',
        'self'     => 'клиент',
        'mother' => 'мать',
        'father' => 'отец',
        'nephew' => 'племянник',
        'niece'  => 'племянница'
    ];

    private $serviceData = [
        'Консультация'        => ['alias' => 'consult',    'color' => '#0073b7'],
        'Коррекция'           => ['alias' => 'correction', 'color' => '#f39c12'],
        'Изготовление стелек' => ['alias' => 'insoles',    'color' => '#00c0ef'],
        'Массаж'              => ['alias' => 'massage',    'color' => '#00a65a'],
    ];


    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
    }

    /**
     * @see Console\Command\Command
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
     * @see Console\Command\Command
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getManager();
//        $country = $this->getContainer()->get('ortofit_back_office.client_country_manage')->getDefault();
//        $city = new City();
//        $city->setCountry($country);
//        $city->setName('Dnepropetrovsk');
//        $manager->persist($city);
//
//        $app = new Application();
//        $app->setName('Visit');
//        $app->setType(Application::TYPE_VISIT);
//        $app->setCountry($country);
//        $app->setFlowServiceName('ortofit_sing_up.application_flow');
//        $app->setConfig([
//            'template' => [
//                'name' => 'OrtofitSingUpBundle:SingUp:index.html.twig'
//            ],
//            'notify'     => [
//                'subject' => 'Запись на прием',
//                'body'    => 'Прошу перезвонить мне по тел. +%s и записать на прием.'
//            ]
//        ]);
//        $manager->persist($app);
//
//        foreach($this->directionsSources as $key => $name) {
//            $source = new ClientDirection();
//            $source->setName($name);
//            $source->setAlias($key);
//            $manager->persist($source);
//        }
//
//        foreach ($this->personStatuses as $alias => $name) {
//            $entity = new FamilyStatus();
//            $entity->setName($name);
//            $entity->setAlias($alias);
//            $entity->setGeneral(true);
//            $manager->persist($entity);
//        }
//
//        $office = new Office();
//        $office->setName('Кирова 102');
//        $office->setCity($city);
//        $manager->persist($office);
//
//        $office = new Office();
//        $office->setName('Центр 6');
//        $office->setCity($city);
//        $manager->persist($office);
//
//        foreach ($this->serviceData as $name => $data) {
//            $entity = new Service();
//            $entity->setName($name);
//            $entity->setColor($data['color']);
//            $manager->persist($entity);
//        }
//
//        $manager->flush();

        /** @var ClientDirection $direction */
        $direction = $this->getManager()->getRepository(ClientDirection::clazz())->findOneBy(['alias'=>'internet']);
        /** @var Application[] $applications */
        $applications = $this->getManager()->getRepository(Application::clazz())->findAll();
        foreach ($applications as $application) {
            $application->setClientDirection($direction);
            $manager->merge($application);
        }
        /** @var Client[] $clients */
        $clients = $this->getManager()->getRepository(Client::clazz())->findAll();
        foreach ($clients as $client) {
            $client->setClientDirection($direction);
            $manager->merge($client);
        }
        $manager->flush();
    }
}
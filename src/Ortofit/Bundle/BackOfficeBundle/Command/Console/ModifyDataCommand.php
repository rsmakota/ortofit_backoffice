<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{

    private $doctorNames = ['svyat' =>'Св.Л',  'lesya' => 'Леся',  'sern' => 'Сер.Н',  'eva'=>'Ев.А',  'elena'=>'Елена'];
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
        $operator = new Group('Operator', ['ROLE_USER']);
        $doctor   = new Group('Doctor', ['ROLE_USER']);
        $admin    = new Group('Admin', ['ROLE_USER', 'ROLE_ADMIN']);

        $manager->persist($operator);
        $manager->persist($doctor);
        $manager->persist($admin);

        foreach ($this->doctorNames as $key => $name) {
            $dctr = new User();
            $dctr->setName($name);
            $dctr->setUsername($key);
            $dctr->setUsernameCanonical($key);
            $dctr->setEmail($key.'@ortofit.com.ua');
            $dctr->setUsernameCanonical( $key.'@ortofit.com.ua');
            $dctr->setEnabled(true);
            $dctr->setSalt('skur7u3vt3400swsowowk88w80888k0');
            $dctr->setPassword('$2y$13$skur7u3vt3400swsowowkuFuZFwo2Igjz5jKzE8b0jPDu/NjeJi4O');
            $dctr->addGroup($doctor);

            $manager->persist($dctr);
        }
        $opr = new User();
        $opr->setUsername('operator');
        $opr->setName('operator');
        $opr->setUsernameCanonical('operator');
        $opr->setEmail('operator@ortofit.com.ua');
        $opr->setUsernameCanonical('operator@ortofit.com.ua');
        $opr->setEnabled(true);
        $opr->setSalt('skur7u3vt3400swsowowk88w80888k0');
        $opr->setPassword('$2y$13$skur7u3vt3400swsowowkuFuZFwo2Igjz5jKzE8b0jPDu/NjeJi4O');
        $opr->addGroup($operator);
        $manager->persist($opr);
        /** @var Appointment[] $apps */
        $apps = $manager->getRepository(Appointment::clazz())->findAll();
        foreach ($apps as $app) {
            $app->setUser($dctr);
            $manager->merge($app);
        }
        /** @var Service $services */
        $services = $manager->getRepository(Service::clazz())->find(1);
        $services->setName('Консультации');
        $services->setColor('#f5f5dc');
        $services->setShort('(Конс.)');
        $manager->merge($services);

        $services = $manager->getRepository(Service::clazz())->find(2);
        $services->setName("Коррекция стелек");
        $services->setColor('#32CD32');
        $services->setShort('(КС)');
        $manager->merge($services);

        $services = $manager->getRepository(Service::clazz())->find(3);
        $services->setName("Изготовление стелек ");
        $services->setColor('#fffacd');
        $services->setShort('(ИОС)');
        $manager->merge($services);

        //Массаж
        $services = $manager->getRepository(Service::clazz())->find(4);
        $services->setColor('#ff69b4');
        $services->setShort('(М)');
        $manager->merge($services);

        $services = new Service();
        $services->setName('Компьютерная диагностика');
        $services->setColor('#ffa500');
        $services->setShort('(КД)');
        $manager->persist($services);

        $services = new Service();
        $services->setName('Бесплатная консультация');
        $services->setColor('#4876ff');
        $services->setShort('(б/п конс)');
        $manager->persist($services);

        $manager->flush();


    }
}
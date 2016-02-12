<?php
/**
 * @author    Rodion Smakota <rsmakota@nebupay.com>
 * @copyright 2015 Nebupay LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Command\Console;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Group;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModifyDataCommand extends ContainerAwareCommand
{
    private $data = [
//Office 1
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-01 10:00:00', 'end' => '2016-02-01 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-01 13:00:00', 'end' => '2016-02-01 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-01 15:00:00', 'end' => '2016-02-01 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-02 10:00:00', 'end' => '2016-02-02 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-02 15:00:00', 'end' => '2016-02-02 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-03 10:00:00', 'end' => '2016-02-03 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-03 13:00:00', 'end' => '2016-02-03 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-03 15:00:00', 'end' => '2016-02-03 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-04 10:00:00', 'end' => '2016-02-04 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-04 15:00:00', 'end' => '2016-02-04 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-05 10:00:00', 'end' => '2016-02-05 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-05 13:00:00', 'end' => '2016-02-05 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-05 15:00:00', 'end' => '2016-02-05 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-06 09:00:00', 'end' => '2016-02-06 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-07 09:00:00', 'end' => '2016-02-07 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-08 10:00:00', 'end' => '2016-02-08 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-08 13:00:00', 'end' => '2016-02-08 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-08 15:00:00', 'end' => '2016-02-08 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-09 10:00:00', 'end' => '2016-02-09 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-09 15:00:00', 'end' => '2016-02-09 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-10 10:00:00', 'end' => '2016-02-10 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-10 13:00:00', 'end' => '2016-02-10 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-10 15:00:00', 'end' => '2016-02-10 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-11 10:00:00', 'end' => '2016-02-11 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-11 15:00:00', 'end' => '2016-02-11 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-12 10:00:00', 'end' => '2016-02-12 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-12 13:00:00', 'end' => '2016-02-12 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-12 15:00:00', 'end' => '2016-02-12 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-13 09:00:00', 'end' => '2016-02-13 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-14 09:00:00', 'end' => '2016-02-14 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-15 10:00:00', 'end' => '2016-02-15 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-15 13:00:00', 'end' => '2016-02-15 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-15 15:00:00', 'end' => '2016-02-15 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-16 10:00:00', 'end' => '2016-02-16 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-16 15:00:00', 'end' => '2016-02-16 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-17 10:00:00', 'end' => '2016-02-17 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-17 13:00:00', 'end' => '2016-02-17 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-17 15:00:00', 'end' => '2016-02-17 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-18 10:00:00', 'end' => '2016-02-18 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-18 15:00:00', 'end' => '2016-02-18 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-19 10:00:00', 'end' => '2016-02-19 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-19 13:00:00', 'end' => '2016-02-19 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-19 15:00:00', 'end' => '2016-02-19 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-20 09:00:00', 'end' => '2016-02-20 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-21 09:00:00', 'end' => '2016-02-21 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-22 10:00:00', 'end' => '2016-02-22 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-22 13:00:00', 'end' => '2016-02-22 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-22 15:00:00', 'end' => '2016-02-22 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-23 10:00:00', 'end' => '2016-02-23 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-23 15:00:00', 'end' => '2016-02-23 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-24 10:00:00', 'end' => '2016-02-24 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-24 13:00:00', 'end' => '2016-02-24 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-24 15:00:00', 'end' => '2016-02-24 18:30:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-25 10:00:00', 'end' => '2016-02-25 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-25 15:00:00', 'end' => '2016-02-25 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-26 10:00:00', 'end' => '2016-02-26 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-26 13:00:00', 'end' => '2016-02-26 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-26 15:00:00', 'end' => '2016-02-26 18:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-27 09:00:00', 'end' => '2016-02-27 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-28 09:00:00', 'end' => '2016-02-28 14:30:00'],
        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-29 10:00:00', 'end' => '2016-02-29 12:00:00'],
        ['officeId' => 1, 'userId' => 7, 'start' => '2016-02-29 13:00:00', 'end' => '2016-02-29 14:30:00'],
        ['officeId' => 1, 'userId' => 3, 'start' => '2016-02-29 15:00:00', 'end' => '2016-02-29 18:30:00'],
//Office 2
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-01 10:00:00', 'end' => '2016-02-01 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-01 15:00:00', 'end' => '2016-02-01 18:30:00'],
        ['officeId' => 2, 'userId' => 3, 'start' => '2016-02-02 10:00:00', 'end' => '2016-02-02 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-02 15:00:00', 'end' => '2016-02-02 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-03 10:00:00', 'end' => '2016-02-03 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-03 15:00:00', 'end' => '2016-02-03 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-04 10:00:00', 'end' => '2016-02-04 13:00:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-04 15:00:00', 'end' => '2016-02-04 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-05 10:00:00', 'end' => '2016-02-05 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-05 15:00:00', 'end' => '2016-02-05 18:30:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-06 09:00:00', 'end' => '2016-02-06 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-07 09:00:00', 'end' => '2016-02-07 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-08 10:00:00', 'end' => '2016-02-08 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-08 15:00:00', 'end' => '2016-02-08 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-09 10:00:00', 'end' => '2016-02-09 13:00:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-09 15:00:00', 'end' => '2016-02-09 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-10 10:00:00', 'end' => '2016-02-10 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-10 15:00:00', 'end' => '2016-02-10 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-11 10:00:00', 'end' => '2016-02-11 13:00:00'],
        ['officeId' => 2, 'userId' => 3, 'start' => '2016-02-11 15:00:00', 'end' => '2016-02-11 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-12 10:00:00', 'end' => '2016-02-12 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-12 15:00:00', 'end' => '2016-02-12 18:30:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-13 09:00:00', 'end' => '2016-02-13 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-14 10:00:00', 'end' => '2016-02-14 13:00:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-15 10:00:00', 'end' => '2016-02-15 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-15 15:00:00', 'end' => '2016-02-15 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-16 10:00:00', 'end' => '2016-02-16 13:00:00'],
        ['officeId' => 2, 'userId' => 3, 'start' => '2016-02-16 15:00:00', 'end' => '2016-02-16 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-17 10:00:00', 'end' => '2016-02-17 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-17 15:00:00', 'end' => '2016-02-17 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-18 10:00:00', 'end' => '2016-02-18 13:00:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-18 15:00:00', 'end' => '2016-02-18 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-19 10:00:00', 'end' => '2016-02-19 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-19 15:00:00', 'end' => '2016-02-19 18:30:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-20 09:00:00', 'end' => '2016-02-20 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-21 09:00:00', 'end' => '2016-02-21 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-22 10:00:00', 'end' => '2016-02-22 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-22 15:00:00', 'end' => '2016-02-22 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-23 10:00:00', 'end' => '2016-02-23 13:00:00'],
        ['officeId' => 2, 'userId' => 3, 'start' => '2016-02-23 15:00:00', 'end' => '2016-02-23 18:30:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-24 15:00:00', 'end' => '2016-02-24 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-25 10:00:00', 'end' => '2016-02-25 13:00:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-25 15:00:00', 'end' => '2016-02-25 18:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-26 10:00:00', 'end' => '2016-02-26 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-26 15:00:00', 'end' => '2016-02-26 18:30:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-27 09:00:00', 'end' => '2016-02-27 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-28 09:00:00', 'end' => '2016-02-28 14:30:00'],
        ['officeId' => 2, 'userId' => 5, 'start' => '2016-02-29 10:00:00', 'end' => '2016-02-29 13:00:00'],
        ['officeId' => 2, 'userId' => 6, 'start' => '2016-02-29 15:00:00', 'end' => '2016-02-29 18:30:00'],
    ];

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    private function getManager()
    {
        return $this->getContainer()->get('doctrine.orm.entity_manager');
    }

    /**
     * @return \Ortofit\Bundle\BackOfficeBundle\EntityManager\OfficeManager
     */
    private function getOfficeManager()
    {
        return $this->getContainer()->get('ortofit_back_office.office_manage');
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
        foreach ($this->data as $schedData) {
            $office = $this->getOfficeManager()->get($schedData['officeId']);
            $user = $manager->getRepository(User::clazz())->find($schedData['userId']);
            $start = new \DateTime($schedData['start']);
            $end = new \DateTime($schedData['end']);
            $schedule = new Schedule();
            $schedule->setOffice($office);
            $schedule->setUser($user);
            $schedule->setStart($start);
            $schedule->setEnd($end);
            $manager->persist($schedule);
        }

        $manager->flush();
    }
}
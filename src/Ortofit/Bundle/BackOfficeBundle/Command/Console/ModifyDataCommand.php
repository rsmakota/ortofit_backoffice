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
    /**
     * 3 | Св.Л
     * 4 | Леся
     * 5 | Сер.Н
     * 6 | Ев.А
     * 7 | 7
     */
    private $data = [
//Office 2
//        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-01 10:00:00', 'end' => '2016-02-01 12:00:00'],
        ['officeId' => 2, 'start' => '2016-04-01	10:00', 'end' => '2016-04-01	12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-01 13:00', 'end' => '2016-04-01 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-01 15:00', 'end' => '2016-04-01 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-02 09:00', 'end' => '2016-04-02 14:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-03 09:00', 'end' => '2016-04-03 14:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-04 10:00', 'end' => '2016-04-04 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-04 13:00', 'end' => '2016-04-04 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-04 15:00', 'end' => '2016-04-04 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-05 10:00', 'end' => '2016-04-05 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-05 15:00', 'end' => '2016-04-05 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-06 10:00', 'end' => '2016-04-06 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-06 13:00', 'end' => '2016-04-06 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-06 15:00', 'end' => '2016-04-06 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-07 10:00', 'end' => '2016-04-07 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-07 15:00', 'end' => '2016-04-07 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-08 10:00', 'end' => '2016-04-08 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-08 13:00', 'end' => '2016-04-08 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-08 15:00', 'end' => '2016-04-08 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-09 09:00', 'end' => '2016-04-09 14:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-10 09:00', 'end' => '2016-04-10 14:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-11 10:00', 'end' => '2016-04-11 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-11 13:00', 'end' => '2016-04-11 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-11 15:00', 'end' => '2016-04-11 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-12 10:00', 'end' => '2016-04-12 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-12 15:00', 'end' => '2016-04-12 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-13 10:00', 'end' => '2016-04-13 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-13 13:00', 'end' => '2016-04-13 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-13 15:00', 'end' => '2016-04-13 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-14 10:00', 'end' => '2016-04-14 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-14 15:00', 'end' => '2016-04-14 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-15 10:00', 'end' => '2016-04-15 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-15 13:00', 'end' => '2016-04-15 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-15 15:00', 'end' => '2016-04-15 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-16 09:00', 'end' => '2016-04-16 14:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-17 09:00', 'end' => '2016-04-17 14:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-18 10:00', 'end' => '2016-04-18 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-18 13:00', 'end' => '2016-04-18 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-18 15:00', 'end' => '2016-04-18 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-19 10:00', 'end' => '2016-04-19 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-19 15:00', 'end' => '2016-04-19 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-20 10:00', 'end' => '2016-04-20 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-20 13:00', 'end' => '2016-04-20 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-20 15:00', 'end' => '2016-04-20 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-21 10:00', 'end' => '2016-04-21 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-21 15:00', 'end' => '2016-04-21 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-22 10:00', 'end' => '2016-04-22 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-22 13:00', 'end' => '2016-04-22 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-22 15:00', 'end' => '2016-04-22 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-23 09:00', 'end' => '2016-04-23 14:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-24 09:00', 'end' => '2016-04-24 14:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-25 10:00', 'end' => '2016-04-25 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-25 13:00', 'end' => '2016-04-25 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-25 15:00', 'end' => '2016-04-25 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-26 10:00', 'end' => '2016-04-26 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-26 15:00', 'end' => '2016-04-26 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-27 10:00', 'end' => '2016-04-27 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-27 13:00', 'end' => '2016-04-27 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-27 15:00', 'end' => '2016-04-27 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-28 10:00', 'end' => '2016-04-28 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-28 15:00', 'end' => '2016-04-28 18:30', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-29 10:00', 'end' => '2016-04-29 12:00', 'userId' => 4],
        ['officeId' => 2, 'start' => '2016-04-29 13:00', 'end' => '2016-04-29 14:30', 'userId' => 7],
        ['officeId' => 2, 'start' => '2016-04-29 15:00', 'end' => '2016-04-29 18:30', 'userId' => 3],
        ['officeId' => 2, 'start' => '2016-04-30 09:00', 'end' => '2016-04-30 14:30', 'userId' => 4],


        //office 1
        ['officeId' => 1, 'start' => '2016-04-01 10:00', 'end' => '2016-04-01 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-01 15:00', 'end' => '2016-04-01 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-02 09:00', 'end' => '2016-04-02 14:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-03 09:00', 'end' => '2016-04-03 14:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-04 10:00', 'end' => '2016-04-04 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-04 15:00', 'end' => '2016-04-04 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-05 10:00', 'end' => '2016-04-05 13:00', 'userId' => 3],
        ['officeId' => 1, 'start' => '2016-04-05 15:00', 'end' => '2016-04-05 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-06 10:00', 'end' => '2016-04-06 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-06 15:00', 'end' => '2016-04-06 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-07 10:00', 'end' => '2016-04-07 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-07 15:00', 'end' => '2016-04-07 18:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-08 10:00', 'end' => '2016-04-08 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-08 15:00', 'end' => '2016-04-08 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-09 09:00', 'end' => '2016-04-09 14:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-10 09:00', 'end' => '2016-04-10 14:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-11 10:00', 'end' => '2016-04-11 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-11 15:00', 'end' => '2016-04-11 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-12 10:00', 'end' => '2016-04-12 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-12 15:00', 'end' => '2016-04-12 18:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-13 10:00', 'end' => '2016-04-13 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-13 15:00', 'end' => '2016-04-13 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-14 10:00', 'end' => '2016-04-14 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-14 15:00', 'end' => '2016-04-14 18:30', 'userId' => 3],
        ['officeId' => 1, 'start' => '2016-04-15 10:00', 'end' => '2016-04-15 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-15 15:00', 'end' => '2016-04-15 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-16 09:00', 'end' => '2016-04-16 14:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-17 10:00', 'end' => '2016-04-17 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-18 10:00', 'end' => '2016-04-18 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-18 15:00', 'end' => '2016-04-18 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-19 10:00', 'end' => '2016-04-19 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-19 15:00', 'end' => '2016-04-19 18:30', 'userId' => 3],
        ['officeId' => 1, 'start' => '2016-04-20 10:00', 'end' => '2016-04-20 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-20 15:00', 'end' => '2016-04-20 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-21 10:00', 'end' => '2016-04-21 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-21 15:00', 'end' => '2016-04-21 18:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-22 10:00', 'end' => '2016-04-22 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-22 15:00', 'end' => '2016-04-22 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-23 09:00', 'end' => '2016-04-23 14:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-24 09:00', 'end' => '2016-04-24 14:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-25 10:00', 'end' => '2016-04-25 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-25 15:00', 'end' => '2016-04-25 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-26 10:00', 'end' => '2016-04-26 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-26 15:00', 'end' => '2016-04-26 18:30', 'userId' => 3],
        ['officeId' => 1, 'start' => '2016-04-27 15:00', 'end' => '2016-04-27 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-28 10:00', 'end' => '2016-04-28 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-28 15:00', 'end' => '2016-04-28 18:30', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-29 10:00', 'end' => '2016-04-29 13:00', 'userId' => 5],
        ['officeId' => 1, 'start' => '2016-04-29 15:00', 'end' => '2016-04-29 18:30', 'userId' => 6],
        ['officeId' => 1, 'start' => '2016-04-30 09:00', 'end' => '2016-04-30 14:30', 'userId' => 6],

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
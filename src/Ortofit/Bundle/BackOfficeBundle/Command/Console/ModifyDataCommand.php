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
     * 3	Св.Л
       4	Леся
       5	Сер.Н
       6	Ев.А
       7	7

     */
    private $data = [
//Office 2
//        ['officeId' => 1, 'userId' => 4, 'start' => '2016-02-01 10:00:00', 'end' => '2016-02-01 12:00:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-01 10:00', 'end'=> '2016-03-01 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-01 15:00', 'end'=> '2016-03-01 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-02 10:00', 'end'=> '2016-03-02 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-02 13:00', 'end'=> '2016-03-02 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-02 15:00', 'end'=> '2016-03-02 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-03 10:00', 'end'=> '2016-03-03 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-03 15:00', 'end'=> '2016-03-03 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-04 10:00', 'end'=> '2016-03-04 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-04 13:00', 'end'=> '2016-03-04 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-04 15:00', 'end'=> '2016-03-04 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-05 09:00', 'end'=> '2016-03-05 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-06 09:00', 'end'=> '2016-03-06 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-07 10:00', 'end'=> '2016-03-07 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-07 13:00', 'end'=> '2016-03-07 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-07 15:00', 'end'=> '2016-03-07 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-08 10:00', 'end'=> '2016-03-08 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-08 15:00', 'end'=> '2016-03-08 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-09 10:00', 'end'=> '2016-03-09 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-09 13:00', 'end'=> '2016-03-09 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-09 15:00', 'end'=> '2016-03-09 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-10 10:00', 'end'=> '2016-03-10 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-10 15:00', 'end'=> '2016-03-10 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-11 10:00', 'end'=> '2016-03-11 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-11 13:00', 'end'=> '2016-03-11 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-11 15:00', 'end'=> '2016-03-11 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-12 09:00', 'end'=> '2016-03-12 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-13 09:00', 'end'=> '2016-03-13 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-14 10:00', 'end'=> '2016-03-14 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-14 13:00', 'end'=> '2016-03-14 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-14 15:00', 'end'=> '2016-03-14 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-15 10:00', 'end'=> '2016-03-15 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-15 15:00', 'end'=> '2016-03-15 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-16 10:00', 'end'=> '2016-03-16 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-16 13:00', 'end'=> '2016-03-16 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-16 15:00', 'end'=> '2016-03-16 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-17 10:00', 'end'=> '2016-03-17 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-17 15:00', 'end'=> '2016-03-17 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-18 10:00', 'end'=> '2016-03-18 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-18 13:00', 'end'=> '2016-03-18 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-18 15:00', 'end'=> '2016-03-18 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-19 09:00', 'end'=> '2016-03-19 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-20 09:00', 'end'=> '2016-03-20 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-21 10:00', 'end'=> '2016-03-21 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-21 13:00', 'end'=> '2016-03-21 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-21 15:00', 'end'=> '2016-03-21 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-22 10:00', 'end'=> '2016-03-22 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-22 15:00', 'end'=> '2016-03-22 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-23 10:00', 'end'=> '2016-03-23 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-23 13:00', 'end'=> '2016-03-23 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-23 15:00', 'end'=> '2016-03-23 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-24 10:00', 'end'=> '2016-03-24 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-24 15:00', 'end'=> '2016-03-24 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-25 10:00', 'end'=> '2016-03-25 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-25 13:00', 'end'=> '2016-03-25 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-25 15:00', 'end'=> '2016-03-25 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-26 09:00', 'end'=> '2016-03-26 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-27 09:00', 'end'=> '2016-03-27 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-28 10:00', 'end'=> '2016-03-28 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-28 13:00', 'end'=> '2016-03-28 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-28 15:00', 'end'=> '2016-03-28 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-29 10:00', 'end'=> '2016-03-29 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-29 15:00', 'end'=> '2016-03-29 18:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-30 10:00', 'end'=> '2016-03-30 12:00'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-30 13:00', 'end'=> '2016-03-30 14:30'],
['officeId'=>2, 	'userId'=>3,	'start'=>'2016-03-30 15:00', 'end'=> '2016-03-30 18:30'],
['officeId'=>2, 	'userId'=>7,	'start'=>'2016-03-31 10:00', 'end'=> '2016-03-31 14:30'],
['officeId'=>2, 	'userId'=>4,	'start'=>'2016-03-31 15:00', 'end'=> '2016-03-31 18:30'],

       //office 1
	['officeId'=>1, 'userId'=>3,	'start'=>'2016-03-01 10:00', 'end'=>'2016-03-01 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-01 15:00', 'end'=>'2016-03-01 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-02 10:00', 'end'=>'2016-03-02 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-02 15:00', 'end'=>'2016-03-02 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-03 10:00', 'end'=>'2016-03-03 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-03 15:00', 'end'=>'2016-03-03 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-04 10:00', 'end'=>'2016-03-04 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-04 15:00', 'end'=>'2016-03-04 18:30'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-05 09:00', 'end'=>'2016-03-05 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-06 09:00', 'end'=>'2016-03-06 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-07 10:00', 'end'=>'2016-03-07 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-07 15:00', 'end'=>'2016-03-07 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-08 10:00', 'end'=>'2016-03-08 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-08 15:00', 'end'=>'2016-03-08 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-09 10:00', 'end'=>'2016-03-09 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-09 15:00', 'end'=>'2016-03-09 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-10 10:00', 'end'=>'2016-03-10 13:00'],
	['officeId'=>1, 'userId'=>3,	'start'=>'2016-03-10 15:00', 'end'=>'2016-03-10 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-11 10:00', 'end'=>'2016-03-11 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-11 15:00', 'end'=>'2016-03-11 18:30'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-12 09:00', 'end'=>'2016-03-12 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-13 10:00', 'end'=>'2016-03-13 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-14 10:00', 'end'=>'2016-03-14 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-14 15:00', 'end'=>'2016-03-14 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-15 10:00', 'end'=>'2016-03-15 13:00'],
	['officeId'=>1, 'userId'=>3,	'start'=>'2016-03-15 15:00', 'end'=>'2016-03-15 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-16 10:00', 'end'=>'2016-03-16 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-16 15:00', 'end'=>'2016-03-16 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-17 10:00', 'end'=>'2016-03-17 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-17 15:00', 'end'=>'2016-03-17 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-18 10:00', 'end'=>'2016-03-18 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-18 15:00', 'end'=>'2016-03-18 18:30'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-19 09:00', 'end'=>'2016-03-19 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-20 09:00', 'end'=>'2016-03-20 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-21 10:00', 'end'=>'2016-03-21 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-21 15:00', 'end'=>'2016-03-21 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-22 10:00', 'end'=>'2016-03-22 13:00'],
	['officeId'=>1, 'userId'=>3,	'start'=>'2016-03-22 15:00', 'end'=>'2016-03-22 18:30'],
//	5	2016-03-23'end'=>
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-23 15:00', 'end'=>'2016-03-23 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-24 10:00', 'end'=>'2016-03-24 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-24 15:00', 'end'=>'2016-03-24 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-25 10:00', 'end'=>'2016-03-25 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-25 15:00', 'end'=>'2016-03-25 18:30'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-26 09:00', 'end'=>'2016-03-26 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-27 09:00', 'end'=>'2016-03-27 14:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-28 10:00', 'end'=>'2016-03-28 13:00'],
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-28 15:00', 'end'=>'2016-03-28 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-29 10:00', 'end'=>'2016-03-29 13:00'],
	['officeId'=>1, 'userId'=>3,	'start'=>'2016-03-29 15:00', 'end'=>'2016-03-29 18:30'],
//	5	2016-03-30'end'=>
	['officeId'=>1, 'userId'=>6,	'start'=>'2016-03-30 15:00', 'end'=>'2016-03-30 18:30'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-31 10:00', 'end'=>'2016-03-31 13:00'],
	['officeId'=>1, 'userId'=>5,	'start'=>'2016-03-31 15:00', 'end'=>'2016-03-31 18:30'],

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
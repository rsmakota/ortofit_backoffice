<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */
namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Schedule;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;

/**
 * Class LoadServiceData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadScheduleData extends AbstractFixture implements OrderedFixtureInterface
{


    private $startRange  = [9, 10, 11, 12];
    private $duringRange = [2, 3, 4, 5];
    /**
     * @return Office[]
     */
    private function getOffices()
    {
        $refNames = LoadOfficeData::getOfficeRefNames();
        $offices  = [];
        foreach ($refNames as $name) {
            $offices[] = $this->getReference($name);
        }

        return $offices;
    }

    /**
     * @return User[]
     */
    private function getDoctors()
    {
        $doctorRefNames = LoadUserData::getDoctorRefNames();
        $doctors = [];
        foreach ($doctorRefNames as $name) {
            $doctors[] = $this->getReference($name);
        }

        return $doctors;
    }

    /**
     * @param array $obj
     *
     * @return mixed
     */
    private function random(array $obj)
    {
        return $obj[rand(0, (count($obj) - 1))];
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for($day=-15; $day<=15; $day++) {
            $this->createDaySchedule($day, $manager);
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
        return 130;
    }

    private function createDaySchedule($day, ObjectManager $manager)
    {
        $doctors = $this->getDoctors();
        $offices = $this->getOffices();
        foreach ($doctors as $doctor) {
            $office   = $this->random($offices);
            $schedule = $this->createSchedule($doctor, $office, $day);
            $manager->persist($schedule);
        }
    }

    /**
     * @param User    $doctor
     * @param Office  $offices
     * @param integer $day
     *
     * @return Schedule
     */
    private function createSchedule($doctor, $offices, $day)
    {
        $today     = new \DateTime(date('Y-m-d 00:00:00'));
        $start     = clone $today;
        $startHour = $this->random($this->startRange);
        $during    = $this->random($this->duringRange);
        $start->modify($day.' day')->modify('+'.$startHour.' hour');
        $end = clone $start;
        $end->modify('+'.$during.' hour');
        $schedule = new Schedule();
        $schedule->setUser($doctor);
        $schedule->setOffice($offices);
        $schedule->setStart($start);
        $schedule->setEnd($end);

        return $schedule;
    }
}
<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\Office;
use Ortofit\Bundle\BackOfficeBundle\Entity\Service;


/**
 * Class LoadAppointmentData
 *
 * @package Ortofit\Bundle\SingUpBundle\DataFixtures\ORM
 */
class LoadAppointmentData extends AbstractFixture implements OrderedFixtureInterface
{

    private $services = [
        'consult',
        'correction',
        'insoles',
        'massage',
        'diagnostic',
        'free_consult',
    ];
    private $doctors = ['doctor:svat',  'doctor:lesya' ,  'doctor:ser',  'doctor:eva', 'doctor:elena'];
    private $offices = ['office:kirova', 'office:center'];

    /**
     * @param string  $officeAlias
     * @param integer $day
     * @param integer $hour
     *
     * @return Appointment
     */
    public function create($officeAlias, $day, $hour)
    {

        if ($hour < 10) {
            $hour = '0'.$hour;
        }
        /** @var Client $client */
        $client       = $this->getReference('client:00');
        /** @var Office $office */
        $office       = $this->getReference($officeAlias);
        $serviceAlias = $this->services[rand(0, 5)];
        $description  = 'Description: '.$serviceAlias;
        /** @var Service $service */
        $service      = $this->getReference('service:'.$serviceAlias);

        $date         = new \DateTime($day.' day');
        $date         = new \DateTime($date->format('Y-m-d').' '.$hour.":00:00");
        if (($date->format('w') == 0) && ($hour >= 13)) {
            return;
        }
        $appointment  = new Appointment();
        $appointment->setClient($client);
        $appointment->setDateTime($date);
        $appointment->setOffice($office);
        $appointment->setDuration(30);
        $appointment->setDescription($description);
        $appointment->setService($service);
        $appointment->setUser($this->getReference($this->doctors[rand(0, 4)]));

        return $appointment;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->offices as $officeAlias) {
            for ($d = -15; $d < 15; $d++) {
                for ($h = 10; $h < 19; $h++) {
                    if (rand(0, 3) > 0) {
                        $appointment = $this->create($officeAlias, $d, $h);
                        if ($appointment) {
                            $manager->persist($appointment);
                        }
                    }
                }
            }
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
        return 140;
    }
}
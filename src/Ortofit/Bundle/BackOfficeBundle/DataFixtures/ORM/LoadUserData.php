<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ortofit\Bundle\BackOfficeBundle\Entity\User;

/**
 * Class LoadUserData
 *
 * @package Ortofit\Bundle\BackOfficeBundle\DataFixtures\ORM
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    static public $doctorNames = ['svat' =>'Св.Л',  'lesya' => 'Леся',  'ser' => 'Сер.Н',  'eva'=>'Ев.А',  'elena'=>'Елена'];

    static public function getDoctorRefNames()
    {
        $doctors = [];
        $doctorKeys = array_keys(self::$doctorNames);
        foreach ($doctorKeys as $key) {
            $doctors[] = 'doctor:'.$key;
        }

        return $doctors;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setName('admin');
        $admin->setUsernameCanonical('admin');
        $admin->setEmail('admin@ortofit.com.ua');
        $admin->setUsernameCanonical('admin@ortofit.com.ua');
        $admin->setEnabled(true);
        $admin->setSalt('nstzpcv8dmsk8oocso8c48s0c0wkkgs');
        $admin->setPassword('$2y$13$nstzpcv8dmsk8oocso8c4u09IhighblmsbePPBLb5NZKASdkqjYiK');
        $admin->addGroup($this->getReference('group:admin'));
        $manager->persist($admin);
        foreach (self::$doctorNames as $key => $name) {
            $doctor = new User();
            $doctor->setName($name);
            $doctor->setUsername('doctor' . $name);
            $doctor->setUsernameCanonical('doctor' . $name);
            $doctor->setEmail('doctor' . $name.'@ortofit.com.ua');
            $doctor->setUsernameCanonical('doctor' . $name.'@ortofit.com.ua');
            $doctor->setEnabled(true);
            $doctor->setSalt('nstzpcv8dmsk8oocso8c48s0c0wkkgs');
            $doctor->setPassword('$2y$13$nstzpcv8dmsk8oocso8c4u09IhighblmsbePPBLb5NZKASdkqjYiK');
            $doctor->addGroup($this->getReference('group:doctor'));
            $this->addReference('doctor:'.$key, $doctor);
            $manager->persist($doctor);
        }


        $operator = new User();
        $operator->setUsername('operator');
        $operator->setName('operator');
        $operator->setUsernameCanonical('operator');
        $operator->setEmail('operator@ortofit.com.ua');
        $operator->setUsernameCanonical('operator@ortofit.com.ua');
        $operator->setEnabled(true);
        $operator->setSalt('nstzpcv8dmsk8oocso8c48s0c0wkkgs');
        $operator->setPassword('$2y$13$nstzpcv8dmsk8oocso8c4u09IhighblmsbePPBLb5NZKASdkqjYiK');
        $operator->addGroup($this->getReference('group:operator'));
        $manager->persist($operator);

        $manager->flush();
    }



    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 100;
    }
}
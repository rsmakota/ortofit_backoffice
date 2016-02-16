<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;

/**
 * Class ChoosePerson
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class ChoosePerson extends AbstractState
{
    /**
     * @var AppointmentManager
     */
    private $appManager;
    /**
     * @var Appointment
     */
    private $app;

    public function setAppManager($appManager)
    {
        $this->appManager = $appManager;
    }

    /**
     * @return Appointment
     * @throws \Exception
     */
    private function getApp()
    {
        $request = $this->getRequest();
        $appId   = $request->get('appId');
        if (null == $appId) {
            throw new \Exception('Cant\' find parameter appId');
        }
        if (null == $this->appManager) {
            throw new \Exception('You forgot set AppManager to '.$this->getId().' state');
        }

        return $this->appManager->get($appId);
    }

    /**
     * @return array
     */
    protected function getResponseData()
    {
        return ['app' => $this->app];
    }

    private function dataProcessong()
    {
        $request = $this->getRequest()->request;
        if ($request->has('personId') || $request->has('newPerson')) {
            $this->completed = true;
        }
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->app = $this->getApp();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'choose_person';
    }
}
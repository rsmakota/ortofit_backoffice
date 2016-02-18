<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\AppointmentManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Templating\EngineInterface;

/**
 * Class GeneralState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
abstract class AbstractState implements StateInterface
{

    /**
     * @var Appointment
     */
    protected $app;
    /**
     * @var boolean
     */
    protected $completed = false;
    /**
     * @var string
     */
    protected $template;
    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * @var AppointmentManager
     */
    protected $appManager;
    /**
     * GeneralState constructor.
     *
     * @param string           $template
     * @param RequestStack     $requestStack
     */
    public function __construct($template, RequestStack $requestStack, AppointmentManager $appManager)
    {
        $this->template     = $template;
        $this->requestStack = $requestStack;
        $this->appManager   = $appManager;
    }

    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }
    /**
     * @return Appointment
     * @throws \Exception
     */
    protected function getApp()
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
    abstract public function getResponseData();

    /**
     * @return void
     */
    abstract public function process();

    /**
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    abstract public function getId();

}
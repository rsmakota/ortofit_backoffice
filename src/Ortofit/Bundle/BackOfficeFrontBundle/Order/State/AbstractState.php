<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

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
     * @var EngineInterface
     */
    protected $templateEngine;
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
     * GeneralState constructor.
     *
     * @param string           $template
     * @param RequestStack     $requestStack
     * @param EngineInterface  $templateEngine
     */
    public function __construct($template, RequestStack $requestStack, EngineInterface $templateEngine)
    {
        $this->template       = $template;
        $this->requestStack   = $requestStack;
        $this->templateEngine = $templateEngine;
    }

    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }

    /**
     * @return array
     */
    abstract protected function getResponseData();

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
    public function createResponse()
    {
        return $this->templateEngine->render($this->template, $this->getResponseData());
    }

    abstract public function getId();

}
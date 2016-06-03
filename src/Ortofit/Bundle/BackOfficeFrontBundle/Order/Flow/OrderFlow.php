<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow;

use Monolog\Logger;
use Ortofit\Bundle\BackOfficeFrontBundle\Order\State\StateInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class OrderFlow
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow
 */
class OrderFlow implements FlowInterface
{
    /**
     * @var  SessionInterface
     */
    private $session;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var string
     */
    private $currentStateId;

    /**
     * @var StateInterface[]
     */
    private $states = [];

    /**
     * @var boolean
     */
    private $completed = false;

    /**
     * @param Logger $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @var EngineInterface
     */
    private $templateEngine;

    /**
     * OrderFlow constructor.
     *
     * @param SessionInterface $session
     * @param EngineInterface  $templateEngine
     */
    public function __construct(SessionInterface $session, EngineInterface $templateEngine)
    {
        $this->session        = $session;
        $this->templateEngine = $templateEngine;
    }

    /**
     * @return StateInterface
     */
    private function getCurrentState()
    {
        return $this->states[$this->currentStateId];
    }

    /**
     * @return void
     */
    private function init()
    {
        if ($this->session->has('stateId')) {
            $this->currentStateId = $this->session->get('stateId');
        }
    }

    /**
     * @return false|StateInterface
     */
    private function next()
    {
        $isNext = false;
        foreach ($this->states as $id => $state) {
            if ($isNext) {
                $this->currentStateId = $id;
                $this->session->set('stateId', $id);

                return $this->getCurrentState();
            }
            if ($this->currentStateId == $id) {
                $isNext = true;
            }
        }

        return false;
    }

    /**;
     * @return void
     */
    public function process()
    {
        $this->init();

        $state = $this->getCurrentState();
        $state->process();
        if ($state->isCompleted()) {
            if (!$this->next()) {
                $this->completed = true;
                $this->clear();
                return;
            }
            $this->process();
        }
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        if (!$this->isCompleted()) {
            $state    = $this->getCurrentState();
            $response = $this->templateEngine->render($state->getTemplate(), $state->getResponseData());
        } else {
            $response = 'Complete';
        }

        return new Response($response);
    }

    /**
     * @param StateInterface $state
     */
    public function addState(StateInterface $state)
    {
        $this->states[$state->getId()] = $state;
        if (null == $this->currentStateId) {
            $this->currentStateId = $state->getId();
        }
    }

    /**
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * @return void
     */
    public function clear()
    {
        $this->session->remove('stateId');
        $keys  = array_keys($this->states);
        $state = $this->states[$keys[0]];
        if ($state instanceof StateInterface) {
            $this->currentStateId = $state->getId();
        }
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->clear();
    }
}
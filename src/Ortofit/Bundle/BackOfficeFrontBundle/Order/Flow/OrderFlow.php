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

/**
 * Class OrderFlow
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow
 */
class OrderFlow implements FlowInterface
{

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
     * @param EngineInterface  $templateEngine
     */
    public function __construct(EngineInterface $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    /**
     * @return StateInterface
     */
    private function getCurrentState()
    {
        if (null === $this->currentStateId) {
            $keys  = array_keys($this->states);
            $state = $this->states[$keys[0]];
            $this->currentStateId = $state->getId();
        }

        return $this->states[$this->currentStateId];
    }

    /**
     * @return false|StateInterface
     */
    private function next()
    {
        $isNext = false;
        foreach ($this->states as $stateId => $state) {
            if ($isNext) {
                $this->currentStateId = $stateId;

                return $this->getCurrentState();
            }
            if ($this->currentStateId == $stateId) {
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
        while (true) {
            $state = $this->getCurrentState();
            $state->process();
            if (!$state->isCompleted()) {
                return;
            }
            if (!$this->next()) {
                $this->completed = true;
                $this->rewind();
                return;
            }
        }
    }

    /**
     * @return Response
     *
     * @throws \Exception
     */
    public function getResponse()
    {
        if (!$this->isCompleted()) {
            $state           = $this->getCurrentState();
            $data            = $state->getResponseData();
            $data['stateId'] = $state->getId();
            $response = $this->templateEngine->render($state->getTemplate(), $data);
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
    }

    /**
     * @return boolean
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * @param string $stateId
     */
    public function seek($stateId) {
        $this->currentStateId = $stateId;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        $this->currentStateId = null;
    }
}
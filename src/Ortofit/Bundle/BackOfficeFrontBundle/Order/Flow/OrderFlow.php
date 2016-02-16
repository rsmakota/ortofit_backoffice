<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow;

use Ortofit\Bundle\BackOfficeFrontBundle\Order\State\StateInterface;
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
     * @var string
     */
    private $currentStateId;

    /**
     * @var StateInterface[]
     */
    private $statuses = [];

    /**
     * @return StateInterface
     */
    private function getCurrentState()
    {
        return $this->statuses[$this->currentStateId];
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
     * @return null|StateInterface
     */
    private function next()
    {
        $isNext = false;
        foreach ($this->statuses as $id => $state) {
            if ($isNext) {
                $this->currentStateId = $id;
                $this->session->set('stateId', $id);

                return $this->getCurrentState();
            }
            if ($this->currentStateId == $id) {
                $isNext = true;
            }
        }

        return null;
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        $state = $this->getCurrentState();
        $state->process();
        if ($state->isCompleted()) {
            $this->next();
        }
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->getCurrentState()->createResponse();
    }

    /**
     * @param StateInterface $state
     */
    public function addState(StateInterface $state)
    {
        $this->statuses[$state->getId()] = $state;
        if (null == $this->currentStateId) {
            $this->currentStateId = $state->getId();
        }
    }


    /**
     * @return void
     */
    public function reset()
    {
        $this->session->remove('stateId');
        $state = reset($this->statuses);
        if ($state instanceof StateInterface) {
            $this->currentStateId = $state->getId();
        }
    }
}
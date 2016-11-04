<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;
use Ortofit\Bundle\BackOfficeFrontBundle\Order\Flow\FlowInterface;

/**
 * Class DiagnosisState
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class RewindState extends AbstractState
{

    const PARAM_COMPLETE = 'complete';
    const PARAM_REWIND   = 'rewind';

    /**
     * @var FlowInterface
     */
    private $flow;
    /**
     * @var string
     */
    private $toRewindStateId;

    /**
     * @return array
     */
    public function getResponseData()
    {
        return [
            self::PARAM_NAME_APP => $this->app
        ];
    }

    /**
     * @param mixed $toRewindStateId
     */
    public function setToRewindStateId($toRewindStateId)
    {
        $this->toRewindStateId = $toRewindStateId;
    }

    /**
     * @return boolean
     */
    private function hasComplete()
    {
        $request  = $this->getRequest()->request;
        if ($request->has(self::PARAM_COMPLETE)) {
            return true;
        }

        return false;
    }

    /**
     * @param FlowInterface $flow
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
    }

    /**
     * @return boolean
     */
    private function hasRewind()
    {
        $request  = $this->getRequest()->request;
        if ($request->has(self::PARAM_REWIND)) {
            return true;
        }

        return false;
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        if ($this->hasComplete()) {
            $this->completed = true;
            $this->appManager->success($this->app);
            return;
        }
        if ($this->hasRewind()) {
            $this->completed = true;
            $this->flow->rewind();
            return;
        }
    }

    public function getId()
    {
        return 'rewind_state';
    }

}
<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;


/**
 * Class ChoosePerson
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class ChoosePerson extends AbstractState
{
    /**
     * @return array
     */
    public function getResponseData()
    {
        return ['app' => $this->app];
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->app = $this->getApp();
        $request = $this->getRequest()->request;
        if ($request->has('action')) {
            $this->completed = true;
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'choose_person';
    }


}
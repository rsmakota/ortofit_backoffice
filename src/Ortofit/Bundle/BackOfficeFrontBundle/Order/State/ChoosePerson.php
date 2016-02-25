<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
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
        return [self::PARAM_NAME_APP => $this->app];
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        $request = $this->getRequest()->request;
        if ($request->has(self::PARAM_NAME_ACTION)) {
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
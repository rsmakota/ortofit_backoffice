<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\Client\ClientModel;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Schedule\ScheduleModel;

/**
 * Class ClientModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider
 */
class ScheduleModelProvider extends AbstractRequestModelProvider
{
    /**
     * @return ClientModel
     */
    protected function createModel()
    {
        return new ScheduleModel();
    }

}
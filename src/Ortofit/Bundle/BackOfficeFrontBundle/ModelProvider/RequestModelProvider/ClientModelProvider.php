<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\Client\ClientModel;

/**
 * Class ClientModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider
 */
class ClientModelProvider extends AbstractRequestModelProvider
{
    /**
     * @return ClientModel
     */
    protected function createModel()
    {
        return new ClientModel();
    }

}
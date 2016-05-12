<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Client;

use Ortofit\Bundle\BackOfficeBundle\Entity\Client;
use Ortofit\Bundle\BackOfficeBundle\Entity\ClientDirection;
use Ortofit\Bundle\BackOfficeBundle\Entity\Country;

/**
 * Class ClientViewModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Client
 */
class ClientViewModel extends ClientModel
{
    /**
     * @var Country
     */
    public $country;
    
    /**
     * @var ClientDirection[]
     */
    public $clientDirections;
    
    /**
     * @var ClientDirection
     */
    public $undefinedClientDirection;
    
    /**
     * @var Client
     */
    public $client;
    
    /**
     * @return string
     */
    public function getLocalMsisdn()
    {
        if (null != $this->client) {
            return $this->client->getLocalMsisdn();
        }
        
        return $this->msisdn;
    }

    /**
     * @return integer
     */
    public function getUndefinedClientDirectionId()
    {
        return $this->undefinedClientDirection->getId();
    }
}
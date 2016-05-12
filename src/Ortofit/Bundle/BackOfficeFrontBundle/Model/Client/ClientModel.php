<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Model\Client;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\BaseModel;

/**
 * Class ClientModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model\Client
 */
class ClientModel extends BaseModel
{
    /**
     * @var integer
     */
    public $id;
    
    /**
     * @var string
     */
    public $msisdn;
    
    /**
     * @var integer
     */
    public $countryId;
    
    /**
     * @var integer
     */
    public $clientDirectionId;
    
    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $gender;

    /**
     * @return array
     */
    protected function getCompletedProperties()
    {
        $properties = parent::getCompletedProperties();
        if(($key = array_search('id', $properties)) !== false) {
            unset($properties[$key]);
        }
        
        return $properties;
    }
}
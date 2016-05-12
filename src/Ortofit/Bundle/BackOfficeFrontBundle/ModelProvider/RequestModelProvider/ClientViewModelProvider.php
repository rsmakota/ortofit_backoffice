<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientDirectionManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\CountryManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Client\ClientViewModel;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;

/**
 * Class ClientViewModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider
 */
class ClientViewModelProvider extends AbstractRequestModelProvider
{
    public function setDirectionManager($directionManager)
    {
        $this->directionManager = $directionManager;
    }

    public function setCountryManager($countryManager)
    {
        $this->countryManager = $countryManager;
    }
    /**
     * @var ClientDirectionManager
     */
    private $directionManager;
    
    /**
     * @var CountryManager
     */
    private $countryManager;

    /**
     * @return ModelInterface
     */
    protected function createModel()
    {
        return new ClientViewModel();
    }

    /**
     * @return ModelInterface
     */
    public function getModel()
    {
        /** @var ClientViewModel $model */
        $model = parent::getModel();
        $model->country = $this->countryManager->getDefault();
        $model->clientDirections = $this->directionManager->all();
        
        return $model;
    }
}
<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientManager;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\Client\ClientViewModel;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;
use Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider\ClientModelProvider;
use Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider\ClientViewModelProvider;

/**
 * Class ChoosePerson
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class ClientState extends AbstractState
{
    /**
     * @var ClientManager
     */
    private $clientManager;
    /**
     * @var ClientModelProvider
     */
    private $clientModelProvider;
    /**
     * @var ClientViewModelProvider
     */
    private $clientViewModelProvider;

    /**
     * @param ClientModelProvider $clientModelProvider
     */
    public function setClientModelProvider($clientModelProvider)
    {
        $this->clientModelProvider = $clientModelProvider;
    }

    /**
     * @param ClientViewModelProvider $clientViewModelProvider
     */
    public function setClientViewModelProvider($clientViewModelProvider)
    {
        $this->clientViewModelProvider = $clientViewModelProvider;
    }
    
    protected function checkManagers()
    {
        parent::checkManagers();
        if (null == $this->clientManager) {
            throw new \Exception(printf('You forgot set up manager with name "%s" in state "%s"', "ClientManager", $this->getId()));
        }
        if (null == $this->clientModelProvider) {
            throw new \Exception(printf('You forgot set up manager with name "%s" in state "%s"', "ClientModelProvider", $this->getId()));
        }
        if (null == $this->clientViewModelProvider) {
            throw new \Exception(printf('You forgot set up manager with name "%s" in state "%s"', "ClientViewModelProvider", $this->getId()));
        }
    }

    /**
     * @return boolean
     */
    private function isCompleteClient()
    {
        $client = $this->getApp()->getClient();
        if ((null == $client) || !$client->isComplete()) {
            return false;
        }

        return true;
    }

    /**
     * @return ClientViewModel
     * @throws \Exception
     */
    private function getModelView()
    {
        $client = $this->getApp()->getClient();
        /** @var ClientViewModel $model */
        $model = $this->clientViewModelProvider->getModel();
        if (null != $client) {
            $model->client = $client;
            $model->id = $client->getId();
        }
        
        return $model;
    }

    /**
     * @param ModelInterface $model
     *
     * @throws \Exception
     */
    private function saveClient($model) {
        $app    = $this->getApp();
        $client = $app->getClient();
        if (null == $client) {
            $client = $this->clientManager->findOneBy(['msisdn'=>$model->msisdn]);
        }
        if (null == $client) {
            $client = $this->clientManager->createByModel($model);
        } else {
            $client = $this->clientManager->updateByModel($client, $model);
        }
        $app->setClient($client);

        $this->appManager->merge($app);
    }

    protected function init()
    {
        parent::init();
        $model = $this->clientModelProvider->getModel();
        if ($model->isComplete()) {
            $this->saveClient($model);
        }
    }

    /**
     * @param ClientManager $clientManager
     */
    public function setClientManager($clientManager)
    {
        $this->clientManager = $clientManager;
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        return [
            self::PARAM_NAME_APP   => $this->app,
            self::PARAM_NAME_MODEL => $this->getModelView()
        ];
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        if ($this->isCompleteClient()) {
            $this->completed = true;
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return 'client_state';
    }


}
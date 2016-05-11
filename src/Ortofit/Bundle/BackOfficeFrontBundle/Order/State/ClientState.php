<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\State;

use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientDirectionManager;
use Ortofit\Bundle\BackOfficeBundle\EntityManager\ClientManager;

/**
 * Class ChoosePerson
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\State
 */
class ClientState extends AbstractState
{
    const PARAM_NAME_CLIENT_ID              = 'clientId';
    const PARAM_NAME_CLIENT_NAME            = 'clientName';
    const PARAM_NAME_CLIENT_BORN            = 'clientBorn';
    const PARAM_NAME_CLIENT_GENDER          = 'clientGender';
    const PARAM_NAME_CLIENT_DIRECTIONS      = 'directions';
    const PARAM_NAME_CLIENT_COUNTRY_ID      = 'countryId';
    const PARAM_NAME_CLIENT_DIRECTION_ID    = 'directionId';
    const PARAM_NAME_CLIENT_NA_DIRECTION_ID = 'naDirectionId';

    /**
     * @var ClientManager
     */
    private $clientManager;
    /**
     * @var ClientDirectionManager
     */
    private $clientDirectionManager;

    protected function checkManagers()
    {
        parent::checkManagers();
        if (null == $this->clientManager) {
            throw new \Exception(printf('You forgot set up manager with name "%s" in state "%s"', "ClientManager", $this->getId()));
        }
        if (null == $this->clientDirectionManager) {
            throw new \Exception(printf('You forgot set up manager with name "%s" in state "%s"', "ClientDirectionManager", $this->getId()));
        }
    }

    /**
     * @return boolean
     */
    private function hasClient()
    {
        $request = $this->getRequest()->request;

    }
    /**
     * @param ClientManager $clientManager
     */
    public function setClientManager($clientManager)
    {
        $this->clientManager = $clientManager;
    }

    /**
     * @param ClientDirectionManager $clientDirectionManager
     */
    public function setClientDirectionManager($clientDirectionManager)
    {
        $this->clientDirectionManager = $clientDirectionManager;
    }

    /**
     * @return array
     */
    public function getResponseData()
    {
        return [
            self::PARAM_NAME_APP => $this->app,

        ];
    }

    /**
     * @return void
     */
    public function process()
    {
        $this->init();
        if ($this->hasClient()) {
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
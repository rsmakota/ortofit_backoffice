<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use Monolog\Logger;
use Ortofit\Bundle\BackOfficeFrontBundle\Model\ModelInterface;
use Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\ModelProviderInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class AbstractRequestModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider
 */
abstract class AbstractRequestModelProvider implements ModelProviderInterface
{
    /**
     * @var RequestStack
     */
    protected $requestStack;
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * AppointmentModelProvider constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param Logger $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }

    /**
     * @return ModelInterface
     */
    abstract protected function createModel();
    public function getName()
    {
        return __CLASS__;
    }

    /**
     * @param ModelInterface $model
     *
     * @return ModelInterface
     */
    protected function fillModelFromRequest($model) {
        $request    = $this->getRequest();

        $properties = array_keys(get_class_vars(get_class($model)));
        
        $this->logger->debug('State: '.__CLASS__.' Request data', $request->request->all());
        foreach ($properties as $key) {
            $model->$key = $request->get($key);
        }
        $this->logger->debug('Model Data', get_object_vars($model));
        return $model;
    }

    /**
     * @return ModelInterface
     */
    public function getModel()
    {
        $model = $this->createModel();
        $model = $this->fillModelFromRequest($model);

        return $model;
    }
}
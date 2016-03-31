<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

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
     * AppointmentModelProvider constructor.
     *
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return null|\Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->requestStack->getCurrentRequest();
    }

    abstract protected function createModel();

    /**
     * @return ModelInterface
     */
    public function getModel()
    {
        $model      = $this->createModel();
        $request    = $this->getRequest();
        $properties = array_keys(get_class_vars(get_class($model)));
        foreach ($properties as $key) {
            $model->$key = $request->get($key);
        }

        return $model;
    }
}
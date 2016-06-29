<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator;

/**
 * Class ChartResponseDecorator
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator
 */
class ChartResponseDecoratorService implements ResponseDecoratorServiceInterface
{
    /**
     * @var ResponseDecoratorInterface[]
     */
    private $decorators = [];
    /**
     * @param string $name
     *
     * @return ResponseDecoratorInterface
     */
    public function get($name)
    {
        return $this->decorators[$name];
    }

    public function add(ResponseDecoratorInterface $decorator)
    {
        $this->decorators[$decorator->getName()] = $decorator;
    }
}
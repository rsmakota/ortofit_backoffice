<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator;

/**
 * Interface ResponseDecoratorServiceInterface
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator
 */
interface ResponseDecoratorServiceInterface
{
    /**
     * @param string $name
     *
     * @return ResponseDecoratorInterface
     */
    public function get($name);
    public function add(ResponseDecoratorInterface $decorator);
}
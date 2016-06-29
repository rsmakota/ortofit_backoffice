<?php
/**
 * @copyright 2016 ortofit
 * @author    Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator;

/**
 * Interface ResponseDecoratorInterface
 * @package Ortofit\Bundle\BackOfficeAPIBundle\ResponseDecorator
 */
interface ResponseDecoratorInterface
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function decorate(array $data);

    /**
     * @return string
     */
    public function getName();
}
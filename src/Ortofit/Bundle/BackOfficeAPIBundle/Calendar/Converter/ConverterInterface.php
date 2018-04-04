<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Calendar\Converter;

/**
 * Interface ConverterInterface
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Calendar\Converter
 */
interface ConverterInterface
{
    /**
     * @param mixed $object
     *
     * @return array
     */
    public function convert($object);
}
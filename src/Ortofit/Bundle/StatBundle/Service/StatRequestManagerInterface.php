<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\StatBundle\Service;


use Ortofit\Bundle\StatBundle\Request\StatRequestInterface;

interface StatRequestManagerInterface
{
    /**
     * @return StatRequestInterface
     */
    public function create();
}
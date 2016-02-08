<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Grid;


interface GridInterface
{
    /**
     * @param object $item
     *
     * @return void
     */
    public function addItem($item);

    /**
     * @return array
     */
    public function getArray();
}
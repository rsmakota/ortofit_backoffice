<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Grid;

/**
 * Class DefaultGrid
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Grid
 */
class DefaultGrid implements GridInterface
{
    private $items = [];

    /**
     * DefaultGrid constructor.
     *
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param object $item
     *
     * @return void
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->items;
    }
}
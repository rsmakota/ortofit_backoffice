<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit LTD
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder;

use Ortofit\Bundle\BackOfficeAPIBundle\Grid\GridInterface;
use Ortofit\Bundle\BackOfficeAPIBundle\Model\CalendarEventInterface;

/**
 * Interface EventBuilderInterface
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\EventBuilder
 */
interface EventBuilderInterface
{
    /**
     * @param GridInterface $grid
     *
     * @return CalendarEventInterface[]
     */
    public function create(GridInterface $grid);

}
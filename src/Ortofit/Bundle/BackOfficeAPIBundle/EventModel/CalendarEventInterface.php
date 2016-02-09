<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\EventModel;

/**
 * Interface CalendarEventInterface
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Model
 */
interface CalendarEventInterface
{
    /**
     * @return \DateTime
     */
    public function getStart();

    /**
     * @return \DateTime
     */
    public function getEnd();

    /**
     * @return string
     */
    public function getColor();

    /**
     * @return boolean
     */
    public function getOverlap();

    /**
     * @return string
     */
    public function getRendering();

    /**
     * @return array
     */
    public function getData();

}
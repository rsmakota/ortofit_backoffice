<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2016 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\Model;

/**
 * Interface ScheduleInterface
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Model
 */
interface ScheduleInterface
{
    public function getId();
    /**
     * @return \DateTime
     */
    public function getStart();
    /**
     * @return \DateTime
     */
    public function getEnd();
}
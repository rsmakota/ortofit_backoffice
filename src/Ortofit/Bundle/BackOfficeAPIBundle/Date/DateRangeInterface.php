<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Date;


interface DateRangeInterface
{
    /**
     * @return \DateTime
     */
    public function getFrom();

    /**
     * @return \DateTime
     */
    public function getTo();
}
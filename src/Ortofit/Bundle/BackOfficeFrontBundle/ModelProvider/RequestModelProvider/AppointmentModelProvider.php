<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider\RequestModelProvider;

use Ortofit\Bundle\BackOfficeFrontBundle\Model\Appointment\AppointmentModel;

/**
 * Class AppointmentModelProvider
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\ModelProvider
 */
class AppointmentModelProvider extends AbstractRequestModelProvider
{
    /**
     * @return AppointmentModel
     */
    protected function createModel()
    {
        return new AppointmentModel();
    }
}
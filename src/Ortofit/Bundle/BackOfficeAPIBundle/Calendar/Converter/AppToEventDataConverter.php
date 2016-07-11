<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2016 Ortofit Co
 */

namespace Ortofit\Bundle\BackOfficeAPIBundle\Calendar\Converter;

use Ortofit\Bundle\BackOfficeBundle\Entity\Appointment;
use Ortofit\Bundle\BackOfficeBundle\Entity\AppointmentReason;

/**
 * Class AppToEventDataConverter
 *
 * @package Ortofit\Bundle\BackOfficeAPIBundle\Calendar\Converter
 */
class AppToEventDataConverter implements ConverterInterface 
{

    private $stylesConfig;

    /**
     * @param Appointment $app
     *
     * @return array
     */
    private function createSuccess($app)
    {
        $style  = $this->stylesConfig['success'];

        return [
            'id'              => $app->getId(),
            'title'           => $app->getService()->getShort() . $style['title'],
            'start'           => $app->getDateTime()->format('c'),
            'end'             => $app->getEndDate()->format('c'),
            'backgroundColor' => $style['backgroundColor'],
            'borderColor'     => $style['borderColor'],
            'textColor'       => $style['textColor'],
        ];
    }

    /**
     * @param Appointment $app
     *
     * @return array
     */
    private function createCloseReason($app)
    {
        $style = $this->stylesConfig['closeReason'];
        /** @var AppointmentReason $appReason */
        $appReason = $app->getAppointmentReasons()->last();
        $title = '';
        if ($appReason) {
            $title = $appReason->getReason()->getName();
        }
        return [
            'id'              => $app->getId(),
            'title'           => $app->getService()->getShort() . " " .$title,
            'start'           => $app->getDateTime()->format('c'),
            'end'             => $app->getEndDate()->format('c'),
            'backgroundColor' => $style['backgroundColor'],
            'borderColor'     => $style['borderColor'],
            'textColor'       => $style['textColor'],
        ];
    }

    /**
     * @param Appointment $app
     *
     * @return array
     */
    private function createBold($app)
    {
        $style = $this->stylesConfig['bold'];
        return [
            'id'              => $app->getId(),
            'title'           => $app->getService()->getShort() . " " .$app->getDescription(),
            'start'           => $app->getDateTime()->format('c'),
            'end'             => $app->getEndDate()->format('c'),
            'backgroundColor' => $style['backgroundColor'],
            'borderColor'     => $style['borderColor'],
            'textColor'       => $style['textColor'],
        ];
    }

    /**
     * @param Appointment $app
     *
     * @return array
     */
    private function createNew($app)
    {
        if ($app->getBold()) {
            return $this->createBold($app);
        }

        $service = $app->getService();
        $style   = $this->stylesConfig['new'];

        return [
            'id'              => $app->getId(),
            'title'           => $app->getService()->getShort(),
            'start'           => $app->getDateTime()->format('c'),
            'end'             => $app->getEndDate()->format('c'),
            'backgroundColor' => $service->getColor(),
            'borderColor'     => $service->getColor(),
            'textColor'       => $style['textColor'],
        ];
    }
    
    /**
     * AppToEventDataConverter constructor.
     *
     * @param array $stylesConfig
     */
    public function __construct($stylesConfig)
    {
        $this->stylesConfig = $stylesConfig;
    }

    /**
     * @param Appointment $object
     *
     * @return array
     */
    public function convert($object)
    {
        $data = [];
        switch ($object->getState()) {
            case Appointment::STATE_SUCCESS:
                $data = $this->createSuccess($object);
                break;
            case Appointment::STATE_CLOSE_REASON:
                $data = $this->createCloseReason($object);
                break;
            case Appointment::STATE_NEW:
                $data = $this->createNew($object);
                break;
            default:
                $data = $this->createNew($object);
                break;
        }

        return $data;
    }
}
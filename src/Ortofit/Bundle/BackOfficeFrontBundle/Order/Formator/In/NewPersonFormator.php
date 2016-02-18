<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator\In;

use Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator\FormatorInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class NewPersonFormator
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Order\Formator
 */
class NewPersonFormator implements FormatorInterface
{
    private $reqFields  = ['name' => 'simple', 'gender' => 'simple', 'born' => 'date', 'familyStatus' => 'simple', 'client' => 'simple'];
    private $optFields  = ['isClient' => 'simple'];
    /**
     * @var ParameterBag
     */
    private $data;

    /**
     * @param string  $key
     * @param string  $value
     * @param array   $arr
     */
    private function dateFormat($key, $value, &$arr)
    {
        $arr[$key] =  \DateTime::createFromFormat($value, 'd/m/Y');
    }

    /**
     * @param string  $key
     * @param string  $value
     * @param array   $arr
     */
    private function simpleFormat($key, $value, &$arr)
    {
        $arr[$key] = $value;
    }

    private function format(ParameterBag $params)
    {
        $data = [];
        foreach ($this->reqFields as $name => $type) {
            $method = $type.'Format';
            $this->$method($name, $params->get($name), $data);
        }
        foreach ($this->optFields as $name => $type) {
            $method = $type.'Format';
            if ($params->has($name) && (null != $params->get($name))) {
                $this->$method($name, $params->get($name), $data);
            }
        }

        return new ParameterBag($data);
    }

    /**
     * NewPersonFormator constructor.
     *
     * @param $params
     */
    public function __construct($params)
    {
        $this->data = $this->format($params);
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
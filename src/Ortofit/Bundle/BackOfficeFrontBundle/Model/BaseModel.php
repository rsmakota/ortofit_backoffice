<?php
/**
 * @copyright 2016 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */
namespace Ortofit\Bundle\BackOfficeFrontBundle\Model;

/**
 * Class BaseModel
 *
 * @package Ortofit\Bundle\BackOfficeFrontBundle\Model
 */
class BaseModel implements ModelInterface
{
    /**
     * @return array
     */
    public function getData()
    {
        return get_class_vars(get_class($this));
    }

    /**
     * @param string $name
     *
     * @return boolean
     */
    public function isEmpty($name)
    {
        return empty($this->$name);
    }
}
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
    protected function getCompletedProperties()
    {
        return array_keys(get_class_vars(get_class($this)));
    }
    /**
     * @return array
     */
    public function getData()
    {
        return get_class_vars(get_class($this));
    }

    /**
     * @param string $propertyName
     *
     * @return boolean
     */
    public function isPropertyEmpty($propertyName)
    {
        return empty($this->$propertyName);
    }

    /**
     * @return boolean
     */
    public function isComplete()
    {
        $properties = $this->getCompletedProperties();
        foreach ($properties as $property) {
            if (null == $this->$property) {
                return false;
            }
        }
        return true;
    }
}
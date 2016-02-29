<?php
/**
 * @copyright 2015 ortofit_quiz
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class FamilyStatus
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="family_statuses")
 */
class FamilyStatus implements EntityInterface
{
    const STATUS_CLIENT_ID = 5;
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $general;

    /**
     * @ORM\Column(type="string")
     */
    private $alias;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return boolean
     */
    public function getGeneral()
    {
        return $this->general;
    }

    /**
     * @param boolean $general
     */
    public function setGeneral($general)
    {
        $this->general = $general;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }
    /**
     * @return string
     */
    static public function clazz()
    {
        return get_class();
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'general' => $this->general,
            'alias'   => $this->alias
        ];
    }
}
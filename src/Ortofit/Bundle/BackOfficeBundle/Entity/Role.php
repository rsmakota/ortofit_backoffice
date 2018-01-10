<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2018 Ortofit LLC
 */
namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Service
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */
class Role implements EntityInterface
{

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return get_class_vars(get_class($this));
    }
}
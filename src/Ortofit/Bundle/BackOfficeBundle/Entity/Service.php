<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 Ortofit LLC
 */
namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Service
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="services")
 */
class Service implements EntityInterface
{
    const ALIAS_CONSULTATION              = 'consultation';
    const ALIAS_INSOLES_CORRECTION        = 'insoles_correction';
    const ALIAS_INSOLES_MANUFACTURING     = 'insoles_manufacturing';
    const ALIAS_MASSAGE                   = 'massage';
    const ALIAS_BACK_MASSAGE              = 'back_massage';
    const ALIAS_FOOT_MASSAGE              = 'foot_massage';
    const ALIAS_MASSAGE_ANTI_CELLULITE    = 'massage_anti_cellulite';
    const ALIAS_MASSAGE_CHILD_HEALTHY_GYM = 'child_healthy_gym';
    const ALIAS_KINESIOTERAPY             = 'kinesioterapy';
    const ALIAS_KINESIO_MASSAGE_CHILD     = 'kinesio_massage_child';
    const ALIAS_PC_DIAGNOSTIC             = 'pc_diagnostic';
    const ALIAS_FREE_CONSULTATION         = 'free_consultation';
    const ALIAS_KINESIO_TAPING            = 'kinesio_taping';
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
     * @ORM\Column(type="string")
     */
    private $color;
    /**
     * @ORM\Column(type="string")
     */
    private $short;
    /**
     * @ORM\Column(type="string")
     */
    private $alias;
    /**
     * @ORM\ManyToOne(targetEntity="Ortofit\Bundle\BackOfficeBundle\Entity\ServiceGroup", inversedBy="services")
     * @ORM\JoinColumn(name="service_group_id", referencedColumnName="id")
     */
    private $serviceGroup;

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
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort($short)
    {
        $this->short = $short;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return get_class_vars(get_class($this));
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
     * @return ServiceGroup
     */
    public function getServiceGroup()
    {
        return $this->serviceGroup;
    }

    /**
     * @param ServiceGroup $serviceGroup
     */
    public function setServiceGroup($serviceGroup)
    {
        $this->serviceGroup = $serviceGroup;
    }


}
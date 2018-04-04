<?php
/**
 * @author    Rodion Smakota <rsmakota@commercegate.com>
 * @copyright 2017 Commercegate LTD
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Service
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="service_groups")
 */
class ServiceGroup
{
    const SERVICE_GROUP_ALIAS_BASE         = 'base';
    const SERVICE_GROUP_ALIAS_BASE_MASSAGE = 'base_massage';
    const SERVICE_GROUP_ALIAS_MASSAGE      = 'massage';

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
    private $alias;
    /**
     * @ORM\OneToMany(targetEntity="Ortofit\Bundle\BackOfficeBundle\Entity\Service", mappedBy="serviceGroup")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $services;

    /**
     * ServiceGroup constructor.
     */
    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

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
     * @return ArrayCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param ArrayCollection $services
     */
    public function setServices($services)
    {
        $this->services = $services;
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

}
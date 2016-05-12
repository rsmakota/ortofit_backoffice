<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class ClientSource
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="client_directions")
 */
class ClientDirection implements EntityInterface
{
    const DIRECTION_ALIAS_UNKNOWN = 'unknown';
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
     * @ORM\Column(type="integer", name="order_num")
     */
    private $orderNum;

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    public function getOrderNum()
    {
        return $this->orderNum;
    }

    public function setOrderNum($orderNum)
    {
        $this->orderNum = $orderNum;
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
     * @return boolean
     */
    public function isUnknown()
    {
        if ($this->alias == self::DIRECTION_ALIAS_UNKNOWN) {
            return true;
        }

        return false;
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
            'id'    => $this->id,
            'name'  => $this->name,
            'alias' => $this->alias
        ];
    }
}
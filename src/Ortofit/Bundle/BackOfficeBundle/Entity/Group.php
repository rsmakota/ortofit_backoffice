<?php
/**
 * @copyright 2016 ortofit_backoffice
 * @author Rodion Smakota <rsmakota@gmail.com>
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="groups")
 */
class Group extends BaseGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    protected $users;

    public function __construct($name, $roles = array())
    {
        parent::__construct($name, $roles);
        $this->users = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }


}
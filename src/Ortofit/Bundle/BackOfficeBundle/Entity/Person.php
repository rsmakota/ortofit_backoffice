<?php
/**
 * @author    Rodion Smakota <rsmakota@gmail.com>
 * @copyright 2015 Ortofit LLC
 */

namespace Ortofit\Bundle\BackOfficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Person
 *
 * @package Ortofit\Bundle\BackOfficeBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="persons")
 */
class Person implements EntityInterface
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

    /**
     * @ORM\Column(type="datetime")
     */
    private $born;

    /**
     * @ORM\ManyToOne(targetEntity="FamilyStatus")
     * @ORM\JoinColumn(name="family_status_id", referencedColumnName="id")
     */
    private $familyStatus;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\OneToMany(targetEntity="Diagnosis", mappedBy="person")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $diagnoses;
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="persons")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->diagnoses = new ArrayCollection();
        $this->created   = new \DateTime();
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \DateTime
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * @param \DateTime $born
     */
    public function setBorn($born)
    {
        $this->born = $born;
    }

    /**
     * @return FamilyStatus
     */
    public function getFamilyStatus()
    {
        return $this->familyStatus;
    }

    /**
     * @param FamilyStatus $familyStatus
     */
    public function setFamilyStatus($familyStatus)
    {
        $this->familyStatus = $familyStatus;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getDiagnoses()
    {
        return $this->diagnoses;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        $now      = new \DateTime();
        $interval = $now->diff($this->born);

        return $interval->y;
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
        // TODO: Implement getData() method.
    }
}
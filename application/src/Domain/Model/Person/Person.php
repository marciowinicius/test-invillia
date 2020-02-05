<?php

namespace Domain\Model\Person;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Person
 * @package Domain\Model
 * @ORM\Table("people")
 * @ORM\Entity(repositoryClass="Infrastructure\Persistence\Doctrine\PersonRepository")
 */
class Person
{
    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @Serializer\Groups("default")
     * @ORM\Column(name="personid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $personid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="personname")
     */
    protected $personname;

    /**
     * @var Collection
     * @Serializer\Type("ArrayCollection<Domain\Model\Person\Phone>")
     * @Serializer\XmlList(entry="phone")
     * @Serializer\Groups("default")
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="person")
     */
    protected $phones;

    /**
     * @return int
     */
    public function getPersonid()
    {
        return $this->personid;
    }

    /**
     * @param int $personid
     */
    public function setPersonid($personid)
    {
        $this->personid = $personid;
    }

    /**
     * @return string
     */
    public function getPersonname()
    {
        return $this->personname;
    }

    /**
     * @param string $personname
     */
    public function setPersonname($personname)
    {
        $this->personname = $personname;
    }

    /**
     * @return Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param Collection $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

}
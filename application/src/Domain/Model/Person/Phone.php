<?php

namespace Domain\Model\Person;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Phone
 * @package Domain\Model\Person
 * @ORM\Table("phones")
 * @ORM\Entity
 */
class Phone
{
    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @ORM\Column(name="phoneid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Person
     *
     * @Serializer\Type("Person")
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="phones")
     * @ORM\JoinColumn(name="personid", referencedColumnName="personid", nullable=false)
     */
    protected $person;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\XmlValue()
     * @Serializer\Groups("default")
     * @ORM\Column(name="phone", type="integer")
     */
    protected $phone;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person): void
    {
        $this->person = $person;
    }

    /**
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     */
    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

}
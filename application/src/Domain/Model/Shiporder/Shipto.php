<?php

namespace Domain\Model\Shiporder;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Shipto
 * @package Domain\Model\Shiporder
 * @ORM\Table("shiptos")
 * @ORM\Entity
 */
class Shipto
{
    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @ORM\Column(name="shiptoid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $shiptoid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="address")
     */
    protected $address;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="city")
     */
    protected $city;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="country")
     */
    protected $country;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

}
<?php

namespace Domain\Model\Shiporder;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Domain\Model\Person\Person;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Shiporder
 * @package Domain\Model\Shiporder
 * @ORM\Table("shiporders")
 * @ORM\Entity(repositoryClass="Infrastructure\Persistence\Doctrine\ShiporderRepository")
 */
class Shiporder
{
    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @Serializer\Groups("default")
     * @ORM\Column(name="orderid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $orderid;

    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @Serializer\Groups("default")
     * @ORM\Column(name="orderperson", type="integer")
     */
    protected $orderperson;

    /**
     * @var Shipto
     *
     * @Serializer\Type("Domain\Model\Shiporder\Shipto")
     * @Serializer\Groups("default")
     * @ORM\OneToOne(targetEntity="Shipto", inversedBy="", cascade={"persist"})
     * @ORM\JoinColumn(name="shiptoid", referencedColumnName="shiptoid", nullable=false)
     */
    protected $shipto;

    /**
     * @var Collection
     *
     * @Serializer\Type("ArrayCollection<Domain\Model\Shiporder\Item>")
     * @Serializer\XmlList(entry="item")
     * @Serializer\Groups("default")
     * @ORM\OneToMany(targetEntity="Item", mappedBy="shiporder")
     */
    protected $items;

    /**
     * @return int
     */
    public function getOrderid(): int
    {
        return $this->orderid;
    }

    /**
     * @param int $orderid
     */
    public function setOrderid(int $orderid): void
    {
        $this->orderid = $orderid;
    }

    /**
     * @return int
     */
    public function getOrderperson(): int
    {
        return $this->orderperson;
    }

    /**
     * @param int $orderperson
     */
    public function setOrderperson(int $orderperson): void
    {
        $this->orderperson = $orderperson;
    }

    /**
     * @return Shipto
     */
    public function getShipto(): Shipto
    {
        return $this->shipto;
    }

    /**
     * @param Shipto $shipto
     */
    public function setShipto(Shipto $shipto): void
    {
        $this->shipto = $shipto;
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }
}
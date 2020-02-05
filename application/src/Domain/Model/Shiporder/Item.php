<?php

namespace Domain\Model\Shiporder;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Item
 * @package Domain\Model\Shiporder
 * @ORM\Table("items")
 * @ORM\Entity
 */
class Item
{
    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @ORM\Column(name="itemid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $itemid;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     * @ORM\Column(name="note")
     */
    protected $note;

    /**
     * @var integer
     *
     * @Serializer\Type("integer")
     * @Serializer\Groups("default")
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     * @Serializer\Groups("default")
     * @ORM\Column(name="price", type="float")
     */
    protected $price;

    /**
     * @var Shiporder
     *
     * @Serializer\Type("Shiporder")
     * @ORM\ManyToOne(targetEntity="Shiporder", inversedBy="items")
     * @ORM\JoinColumn(name="orderid", referencedColumnName="orderid", nullable=false)
     */
    protected $shiporder;

    /**
     * @return int
     */
    public function getItemid(): int
    {
        return $this->itemid;
    }

    /**
     * @param int $itemid
     */
    public function setItemid(int $itemid): void
    {
        $this->itemid = $itemid;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return Shiporder
     */
    public function getShiporder(): Shiporder
    {
        return $this->shiporder;
    }

    /**
     * @param Shiporder $shiporder
     */
    public function setShiporder(Shiporder $shiporder): void
    {
        $this->shiporder = $shiporder;
    }

}
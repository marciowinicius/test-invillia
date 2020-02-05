<?php

namespace Infrastructure\Presentation\DataTransferObject;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Shiporders
 * @package Infrastructure\Presentation\DataTransferObject
 */
class Shiporders
{
    /**
     * @var Collection
     * @Serializer\Type("ArrayCollection<Domain\Model\Shiporder\Shiporder>")
     * @Serializer\XmlList(inline = true, entry="shiporder")
     * @Serializer\Groups("default")
     */
    private $shiporders;

    /**
     * @return Collection
     */
    public function getShiporders(): Collection
    {
        return $this->shiporders;
    }

    /**
     * @param Collection $shiporders
     */
    public function setShiporders(Collection $shiporders): void
    {
        $this->shiporders = $shiporders;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->shiporders->isEmpty();
    }

}
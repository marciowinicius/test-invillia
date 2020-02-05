<?php

namespace Infrastructure\Presentation\DataTransferObject;

use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class People
 * @package Infrastructure\Presentation\DataTransferObject
 */
class People
{
    /**
     * @var Collection
     * @Serializer\Type("ArrayCollection<Domain\Model\Person\Person>")
     * @Serializer\XmlList(inline = true, entry="person")
     * @Serializer\Groups("default")
     */
    private $people;

    /**
     * @return Collection
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    /**
     * @param Collection $people
     */
    public function setPeople(Collection $people): void
    {
        $this->people = $people;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->people->isEmpty();
    }

}
<?php

namespace Domain\Model\Shiporder;

use Doctrine\Common\Collections\Collection;

/**
 * Interface ShiporderRepositoryInterface
 * @package Domain\Model\Shiporder
 */
interface ShiporderRepositoryInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @param int $id
     * @return object
     */
    public function getById(int $id): object;

    /**
     * @param Collection $shiporders
     */
    public function saveByCollection(Collection $shiporders): void;
}
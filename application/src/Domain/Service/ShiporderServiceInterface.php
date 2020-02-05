<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

/**
 * Interface ShiporderServiceInterface
 * @package Domain\Service
 */
interface ShiporderServiceInterface
{
    /**
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * @param int $id
     * @return null|object
     */
    public function findOneById(int $id);

    /**
     * @param Collection $shiporders
     */
    public function insertByCollection(Collection $shiporders): void;
}
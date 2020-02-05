<?php

namespace Domain\Service;

use Doctrine\Common\Collections\Collection;

/**
 * Interface PersonServiceInterface
 * @package Domain\Service
 */
interface PersonServiceInterface
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
     * @param Collection $people
     */
    public function insertByCollection(Collection $people): void;
}
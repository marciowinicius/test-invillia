<?php

namespace AppBundle\Service;

use Doctrine\Common\Collections\Collection;
use Domain\Model\Shiporder\ShiporderRepositoryInterface;
use Domain\Service\ShiporderServiceInterface;

class ShiporderService implements ShiporderServiceInterface
{
    /**
     * @var ShiporderRepositoryInterface
     */
    private $shiporderRepository;

    /**
     * ShiporderService constructor.
     * @param ShiporderRepositoryInterface $shiporderRepository
     */
    public function __construct(ShiporderRepositoryInterface $shiporderRepository)
    {
        $this->shiporderRepository = $shiporderRepository;
    }

    /**
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->shiporderRepository->list();
    }

    /**
     * @param int $id
     * @return null|object
     */
    public function findOneById(int $id)
    {
        return $this->shiporderRepository->getById($id);
    }

    /**
     * @param Collection $shiporders
     */
    public function insertByCollection(Collection $shiporders): void
    {
        $this->shiporderRepository->saveByCollection($shiporders);
    }
}
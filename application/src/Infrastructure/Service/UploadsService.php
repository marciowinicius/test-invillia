<?php

namespace Infrastructure\Service;

use Domain\Service\PersonServiceInterface;
use Domain\Service\ShiporderServiceInterface;
use Infrastructure\Service\Contracts\UploadsServiceInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class UploadsService implements UploadsServiceInterface
{
    /**
     * @var PersonServiceInterface
     */
    private $personService;

    /**
     * @var ShiporderServiceInterface
     */
    private $shiporderService;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * UploadsService constructor.
     * @param PersonServiceInterface $personService
     * @param ShiporderServiceInterface $shiporderService
     * @param SerializerInterface $serializer
     */
    public function __construct(
        PersonServiceInterface $personService,
        ShiporderServiceInterface $shiporderService,
        SerializerInterface $serializer
    ) {
        $this->personService = $personService;
        $this->shiporderService = $shiporderService;
        $this->serializer = $serializer;
    }

    /**
     * @param $content
     */
    public function processesXml($content): void
    {
        $people = $this->serializer->deserialize(
            $content,
            'Infrastructure\Presentation\DataTransferObject\People',
            'xml'
        );

        $shiporders = $this->serializer->deserialize(
            $content,
            'Infrastructure\Presentation\DataTransferObject\Shiporders',
            'xml'
        );

        if (!$people->isEmpty()) {
            $this->personService->insertByCollection($people->getPeople());
        }

        if (!$shiporders->isEmpty()) {
            $this->shiporderService->insertByCollection($shiporders->getShiporders());
        }

        if ($people->isEmpty() && $shiporders->isEmpty()) {
            throw new BadRequestHttpException("Invalid XML! Must be of type People or Shiporders.");
        }
    }
}
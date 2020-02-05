<?php

namespace Infrastructure\Service;

use Infrastructure\Service\Contracts\JsonServiceInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;

class JsonService implements JsonServiceInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * JsonService constructor.
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function deserialize($data, $type)
    {
        return $this->serializer->deserialize($data, $type, 'json');
    }

    /**
     * @param $data
     * @param SerializationContext|null $context
     * @return mixed
     */
    public function serialize($data, SerializationContext $context = null)
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    /**
     * @param $data
     * @param array $groups
     * @return mixed
     */
    public function serializeByGroups($data, array $groups = ['default'])
    {
        return $this->serializer->serialize(
            $data,
            'json',
            SerializationContext::create()->setGroups($groups)
        );
    }
}
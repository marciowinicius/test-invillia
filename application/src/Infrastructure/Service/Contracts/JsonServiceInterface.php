<?php

namespace Infrastructure\Service\Contracts;

use JMS\Serializer\SerializationContext;

/**
 * Interface JsonServiceInterface
 * @package Infrastructure\Service\Contracts
 */
interface JsonServiceInterface
{
    /**
     * @param $data
     * @param $type
     * @return mixed
     */
    public function deserialize($data, $type);

    /**
     * @param $data
     * @param SerializationContext|null $context
     * @return mixed
     */
    public function serialize($data, SerializationContext $context = null);

    /**
     * @param $data
     * @param array $groups
     * @return mixed
     */
    public function serializeByGroups($data, array $groups = ['default']);
}
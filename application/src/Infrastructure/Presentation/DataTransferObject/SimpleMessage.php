<?php

namespace Infrastructure\Presentation\DataTransferObject;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SimpleMessage
 * @package Presentation\DataTransferObject
 */
class SimpleMessage
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("default")
     */
    private $message;

    /**
     * SimpleMessage constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}

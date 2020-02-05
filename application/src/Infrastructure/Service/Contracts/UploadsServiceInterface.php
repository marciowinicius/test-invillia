<?php

namespace Infrastructure\Service\Contracts;

/**
 * Interface UploadsServiceInterface
 * @package Infrastructure\Service\Contracts
 */
interface UploadsServiceInterface
{
    /**
     * @param $content
     */
    public function processesXml($content): void;
}
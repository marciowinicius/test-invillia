<?php

namespace Infrastructure\Service\Contracts;

use Symfony\Component\HttpFoundation\Response;

interface JsonResponseServiceInterface
{
    /**
     * @param $type
     * @param array $groups
     * @return Response
     */
    public function success($type = null, array $groups = ['default']): Response;

    /**
     * @param string $message
     * @param array $groups
     * @return Response
     */
    public function badRequest(string $message = '', array $groups = ['default']): Response;

    /**
     * @param string $message
     * @param array $groups
     * @return Response
     */
    public function internalError(string $message = '', array $groups = ['default']): Response;

    /**
     * @return Response
     */
    public function noContent(): Response;

    /**
     * @return Response
     */
    public function created(): Response;
}
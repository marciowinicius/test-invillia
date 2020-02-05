<?php

namespace Infrastructure\Service;

use Infrastructure\Presentation\DataTransferObject\SimpleMessage;
use Infrastructure\Service\Contracts\JsonResponseServiceInterface;
use Infrastructure\Service\Contracts\JsonServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseService implements JsonResponseServiceInterface
{
    /**
     * @var JsonServiceInterface
     */
    private $jsonService;

    /**
     * JsonResponse constructor.
     * @param JsonServiceInterface $jsonService
     */
    public function __construct(JsonServiceInterface $jsonService)
    {
        $this->jsonService = $jsonService;
    }

    /**
     * @param $type
     * @param array $groups
     * @return Response
     */
    public function success($type = null, array $groups = ['default']): Response
    {
        return $this->createResponse(Response::HTTP_OK, $type, $groups);
    }

    /**
     * @param string $message
     * @param array $groups
     * @return Response
     */
    public function badRequest(string $message = '', array $groups = ['default']): Response
    {
        return $this->createResponse(
            Response::HTTP_BAD_REQUEST,
            $this->simpleMessage($message),
            $groups
        );
    }

    /**
     * @param string $message
     * @param array $groups
     * @return Response
     */
    public function internalError(string $message = '', array $groups = ['default']): Response
    {
        return $this->createResponse(
            Response::HTTP_INTERNAL_SERVER_ERROR,
            $this->simpleMessage($message),
            $groups
        );
    }

    /**
     * @return Response
     */
    public function noContent(): Response
    {
        return $this->createResponse(Response::HTTP_NO_CONTENT);
    }

    /**
     * @return Response
     */
    public function created(): Response
    {
        return $this->createResponse(Response::HTTP_CREATED);
    }

    private function createResponse(
        int $code,
        $type = null,
        array $groups = ['default'],
        array $headers = ['Content-type' => 'application/json']
    ): Response
    {
        if (!$type) {
            return new Response('', $code);
        }

        return new Response(
            $this->jsonService->serializeByGroups($type, $groups),
            $code,
            $headers
        );
    }

    private function simpleMessage(string $message = '')
    {
        return $message ? new SimpleMessage($message) : null;
    }
}
<?php

namespace AppBundle\EventSubscriber;

use DomainException;
use Exception;
use Infrastructure\Service\JsonResponseService;
use Monolog\Logger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class ExceptionSubscriber
 * @package AppBundle\EventSubscriber
 */
class ExceptionSubscriber implements EventSubscriberInterface
{
    /**
     * @var JsonResponseService
     */
    private $jsonResponseService;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * ExceptionListener constructor.
     * @param JsonResponseService $jsonResponseService
     * @param Logger $logger
     */
    public function __construct(JsonResponseService $jsonResponseService, Logger $logger)
    {
        $this->logger = $logger;
        $this->jsonResponseService = $jsonResponseService;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => ['onException', 9999]
        ];
    }

    /**
     * @param GetResponseForExceptionEvent $event
     */
    public function onException(GetResponseForExceptionEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $exception = $event->getException();

        $event->setResponse($this->handleException($exception));
    }

    /**
     * @param Exception $exception
     */
    private function saveLogger(Exception $exception)
    {
        $this->logger->error($exception->getMessage(), $exception->getTrace());
    }

    /**
     * @param Exception $exception
     * @return Response
     */
    private function handleException(Exception $exception): Response
    {
        $this->saveLogger($exception);

        $message = $exception->getMessage();

        if ($exception instanceof BadRequestHttpException) {
            return $this->jsonResponseService->badRequest($message);
        }

        return $this->jsonResponseService->internalError($message);
    }
}

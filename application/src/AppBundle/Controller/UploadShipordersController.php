<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class UploadPeopleController
 * @package AppBundle\Controller
 */
class UploadShipordersController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Upload the Shiporders XML",
     *   statusCodes={
     *     201="Returned when XML is successfully processed",
     *     400="Returned when is invalid XML"
     *   }
     * )
     * @param Request $request
     * @return Response
     */
    public function postUploadShipordersAction(Request $request): Response
    {
        $serializer = $this->get('jms_serializer');
        $jsonResponseService = $this->get('infra.json_response.service');
        $shiporderService = $this->get('app.shiporder.service');

        $shiporders = $serializer->deserialize(
            $request->getContent(),
            'Infrastructure\Presentation\DataTransferObject\Shiporders',
            'xml'
        );

        if ($shiporders->isEmpty()) {
            throw new BadRequestHttpException("Invalid XML! Must be of type Shiporders.");
        }

        $shiporderService->insertByCollection($shiporders->getShiporders());

        return $jsonResponseService->created();
    }
}
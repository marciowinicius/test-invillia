<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UploadsController
 * @package AppBundle\Controller
 */
class UploadsController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Upload the XML People or Shiporders from the request body",
     *   statusCodes={
     *     201="Returned when XML is successfully processed",
     *     400="Returned when is invalid XML"
     *   }
     * )
     * @param Request $request
     * @return Response
     */
    public function postUploadsAction(Request $request): Response
    {
        $uploadsService = $this->get('infra.uploads.service');
        $jsonResponseService = $this->get('infra.json_response.service');

        $uploadsService->processesXml($request->getContent());

        return $jsonResponseService->created();
    }
}
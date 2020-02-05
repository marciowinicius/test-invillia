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
class UploadPeopleController extends FOSRestController
{
    /**
     * @ApiDoc(
     *   description="Upload the People XML",
     *   statusCodes={
     *     201="Returned when XML is successfully processed",
     *     400="Returned when is invalid XML"
     *   }
     * )
     * @param Request $request
     * @return Response
     */
    public function postUploadPeopleAction(Request $request): Response
    {
        $serializer = $this->get('jms_serializer');
        $jsonResponseService = $this->get('infra.json_response.service');
        $personService = $this->get('app.person.service');

        $people = $serializer->deserialize(
            $request->getContent(),
            'Infrastructure\Presentation\DataTransferObject\People',
            'xml'
        );

        if ($people->isEmpty()) {
            throw new BadRequestHttpException("Invalid XML! Must be of type People.");
        }

        $personService->insertByCollection($people->getPeople());

        return $jsonResponseService->created();
    }
}
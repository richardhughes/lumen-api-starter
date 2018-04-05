<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    protected function successResponse(array $payload)
    {
        $this->response->setBody($payload);

        return response()
            ->json($this->response->toResponse())
            ->setStatusCode(Response::HTTP_OK);
    }

    protected function errorResponse(array $payload)
    {
        $this->response->setBody($payload);

        return response()
            ->json($this->response->toResponse())
            ->setStatusCode(Response::HTTP_BAD_REQUEST);
    }
}

<?php

namespace App\Http\Controllers;

use App\Exceptions\SystemException;
use Illuminate\Http\Response;

trait RespondTrait
{
    /**
     * Respond with a created response
     * @param array $content
     * @return Response
     */
    public function created($content = null)
    {
        $response = new Response($content);
        $response->setStatusCode(Response::HTTP_CREATED);
        return $response;
    }

    /**
     * Respond with an accepted response
     * @param null $content
     * @return Response
     */
    public function accepted($content = null)
    {
        $response = new Response($content);
        $response->setStatusCode(Response::HTTP_ACCEPTED);
        return $response;
    }

    /**
     * Respond with a no content response.
     * @return Response
     */
    public function noContent()
    {
        $response = new Response(null);
        return $response->setStatusCode(Response::HTTP_NO_CONTENT);
    }

    /**
     * Return an error response
     * @param $message
     * @param int $statusCode
     * @param array $arguments
     * @throws SystemException
     */
    public function error($message, $statusCode = 400, $arguments = [])
    {
        throw new SystemException($message, $statusCode, $arguments);
    }

    /**
     * Return a 404 not found error
     * @param array $arg
     * @throws SystemException
     */
    public function errorNotFound($arg = [])
    {
        $this->error('resource_not_found', Response::HTTP_NOT_FOUND, $arg);
    }

    /**
     * Return a 400 bad request error
     * @param string $message
     * @throws SystemException
     */
    public function errorBadRequest($message = 'Bad Request',$arguments=[])
    {
        $this->error($message, Response::HTTP_BAD_REQUEST,$arguments);
    }

    /**
     * Return a 500 internal server error
     * @param string $message
     * @throws SystemException
     */
    public function errorInternal()
    {
        $this->error('internal_server_error', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Return a json collection
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function item($data = [], array $headers = [])
    {
        return new Response($data, Response::HTTP_OK, $headers);
    }

    /**
     * Return a json collection
     * @param array $data
     * @param array $headers
     * @return Response
     */
    public function array($data = [], array $headers = [])
    {
        return new Response(compact('data'), Response::HTTP_OK, $headers);
    }

    /**
     * Return a pagination
     * @param array $data
     * @return Response
     */
    public function paginator($data = [])
    {
        return $this->item($data);
    }
}

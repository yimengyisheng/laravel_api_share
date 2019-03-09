<?php

namespace App\Exceptions;


class SystemException extends \Exception
{
    protected $parameters = [];
    protected $errorCode = '';
    protected $httpCode = 0;

    /**
     * SystemException constructor.
     * @param string $message
     * @param int $httpCode
     * @param array $arguments
     */
    public function __construct($message = "", $httpCode = 400, array $arguments = [])
    {
        parent::__construct($message, -1);

        $this->parameters = $arguments;
        $this->httpCode = intval($httpCode);
        $this->message = $message
            ? trans("errors.{$this->message}", $this->parameters)
            : $this->message;
    }

    public function getStatusCode()
    {
        return $this->httpCode;
    }
}
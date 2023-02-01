<?php


class ServerException extends Exception {
    private $exceptionType;

    public function __construct($code, $exceptionType, $message) {
        $this->code = $code;
        $this->exceptionType = $exceptionType;
        $this->message = $message;
    }

    public function getExceptionType()
    {
        return $this->exceptionType;
    }
}
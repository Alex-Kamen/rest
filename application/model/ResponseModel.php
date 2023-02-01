<?php


class ResponseModel {
    private $code;
    private $result;

    public function __construct($result, $code = 200)
    {
        $this->code = $code;
        $this->result = $result;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getResult()
    {
        return $this->result;
    }
}

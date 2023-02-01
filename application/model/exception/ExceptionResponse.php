<?php
require_once(ROOT.'/application/model/mapper/ExceptionResponseMapper.php');

class ExceptionResponse
{
    public static function response($exception)
    {
        return json_encode(ExceptionResponseMapper::toResponse($exception));
    }
}
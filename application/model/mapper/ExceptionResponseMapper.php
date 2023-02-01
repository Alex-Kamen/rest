<?php


class ExceptionResponseMapper
{
    public static function toResponse($model) {
        return array(
            'code' => $model->getCode(),
            'type' => $model->getExceptionType(),
            'message' => $model->getMessage()
        );
    }
}
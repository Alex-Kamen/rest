<?php


class ResponseMapper
{
    public static function toResponse($model) {
        return array(
            'code' => $model->getCode(),
            'result' => $model->getResult()
        );
    }
}
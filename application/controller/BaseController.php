<?php
require_once(ROOT.'/application/model/ResponseModel.php');
require_once(ROOT.'/application/model/mapper/ResponseMapper.php');

class BaseController {
    protected static function responseOk($result, $code = 200) {
        http_response_code($code);
        return json_encode(ResponseMapper::toResponse(new ResponseModel($result, $code)));
    }
}
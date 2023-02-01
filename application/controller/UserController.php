<?php
require_once(ROOT.'/application/controller/BaseController.php');
require_once(ROOT.'/application/service/UserService.php');

class UserController extends BaseController {

    public function list($params) {
        return $this->responseOk(UserService::list());
    }

    public function getById($params) {
        return $this->responseOk(UserService::getById($params['arguments'][0]));
    }

    public function add($params) {
        return $this->responseOk(UserService::add($params['arguments'][0]));
    }

    public function update($params) {
        return $this->responseOk(UserService::update($params['arguments'][0]));
    }

    public function delete($params) {
        return $this->responseOk(UserService::delete($params['arguments'][0]));
    }
}
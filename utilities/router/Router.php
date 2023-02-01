<?php
require_once(ROOT.'/application/model/exception/ServerException.php');

class Router {

    private $routeList;

    public function __construct() {
        $this->routeList = include(ROOT.'/utilities/router/routes.php');
    }

    public function run() {
        $routes = $this->routeList[$_SERVER['REQUEST_METHOD']];
        $url = trim($_SERVER['REQUEST_URI'], '/');

        $params = array(
            'get' => $_GET,
            'post' => json_decode(file_get_contents('php://input'), true),
            'cookie' => $_COOKIE,
            'arguments' => []
        );

        foreach ($routes as $path => $route) {

            if (preg_match("~$path~", $url)) {
                $params['arguments'] = explode(
                    '/', preg_replace("~$path~", $route->getArguments(), $url));

                $controller = $route->getClass();

                echo call_user_func_array(array(new $controller(), $route->getAction()), array($params));

                return;
            }
        }

        throw new ServerException(404, 'NOT FOUND', 'Controller not found');
    }
}
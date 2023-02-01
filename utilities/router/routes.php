<?php
require_once(ROOT.'/utilities/router/Route.php');
require_once(ROOT.'/application/controller/UserController.php');

return array(
    'POST' => [
        'user' => new Route(UserController::class, 'add')
    ],

    'GET' => [
        'user/list' => new Route(UserController::class, 'list'),
        'user/([0-9]+)' => new Route(UserController::class, 'getById', '$1')
    ],

    'PUT' => [
        'user' => new Route(UserController::class, 'update')
    ],

    'DELETE' => [
        'user/([0-9]+)' => new Route(UserController::class, 'delete', '$1')
    ]
);
<?php

require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/DashboardController.php';
require_once 'src/ControllerFactory.php';

class Routing
{
    public static $routes = [
        "login" => [
            "controller" => "SecurityController",
            "action" => "login",
        ],
        "register" => [
            "controller" => "SecurityController", //register 
            "action" => "register",
        ],
        "dashboard" => [
            "controller" => "DashboardController",
            "action" => "index",
        ],
    ];

    public static function run(string $path)
    {
        // /dashboard/_
        if (preg_match('#^dashboard/(\d+)$#', $path, $matches)) {
            $id = (int) $matches[1];

            $controllerObj = ControllerFactory::get("DashboardController");
            $controllerObj->index($id);
            return;
        }

        // no dashboard
        if (isset(self::$routes[$path])) {

            $controllerName = self::$routes[$path]["controller"];
            $action = self::$routes[$path]["action"];

            $controllerObj = ControllerFactory::get($controllerName);
            $controllerObj->$action(null);
            return;
        }

        include 'public/views/404.html';
    }

}

<?php

class ControllerFactory
{
    private static array $instances = [];

    public static function get(string $controllerName)
    {
        if (!isset(self::$instances[$controllerName])) {
            self::$instances[$controllerName] = new $controllerName();
        }
        return self::$instances[$controllerName];
    }
}
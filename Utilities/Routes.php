<?php

class Routes
{
    public static function router()
    {
        // Iterate through a given list of routes.
        $request = $_SERVER['REQUEST_URI'];

        switch ($request) {
            case '':
            case '/' :
            case '/home':
                require_once("./Views/home.php");
                break;
            case '/show-weather':
                require_once("./Views/show-weather.php");
                break;
            default:
                http_response_code(404);
                require_once("./Views/404.php");
                break;
        }
    }
}
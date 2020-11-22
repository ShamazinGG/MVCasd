<?php
//namespace Core;


class Router
{
    private array $routes;
    public static $_instance;
    public function __construct()

    {
        $this->routes = [
            "/" =>  ["Controller" => "UserController",
                      "Action" => "MainAction"],

          "/user/create" => ["Controller" => "UserController",
              "Action" => "CreateAction"],

           "/user/{id}/view" => ["Controller" => "UserController",
               "Action" => "ViewAction"],
            "/user/{id}/update" => ["Controller" => "UserController",
               "Action" => "UpdateAction"],

           "/user/{id}/delete" => ["Controller" => "UserController",
                "Action" => "DeleteAction"],

        ];
    }

    public static function getInstance() : Router
    {
        if(null === self::$_instance) {
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    public function parse()
    {

        $uri = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $routeInfo) {
            $match = true;
            $param = [];
            $routeParts = explode('/', $route);
            $uriParts = explode('/', $uri);

            foreach ($uriParts as $key => $uriPartName) {
                if (!isset($routeParts[$key])){
                    $match = false;
                    continue;
                }
                if (substr($routeParts[$key], 0, 1) == '{' && substr($routeParts[$key], -1, 1) == '}') {
                    $match = true;
                    $param[trim($routeParts[$key], '{}')] = $uriParts[$key];


                } elseif ($routeParts[$key] !== $uriParts[$key]) {
                    $match = false;

                }
            }
            if ($match)
            {

                var_dump($routeInfo["Controller"]);
                include 'App/Controllers/'.$routeInfo["Controller"].'.php';
                $action = new UserController();
//                include 'App/Controllers/'.$routeInfo["Controller"].'.php';
//                $action = new UserController();
                var_dump($routeInfo["Action"]);
                die();
                $action->{$routeInfo["Action"]}();
                break;
            }

        }
        die(404);
    }



}
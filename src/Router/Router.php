<?php
/**
 * Created by PhpStorm.
 * User: oumarsow
 * Date: 20/10/18
 * Time: 16:20
 */

namespace App\Router;


class Router
{
   private $url;
   private $routes = [];

   public function __construct($url)
    {
        $this->url = $url;
    }
    public function get($path,$callable)
    {
        $route = new Route($path,$callable);
        $this->routes['GET'][] = $route;
    }
    public function post($path,$callable)
    {
        $route = new Route($path,$callable);
        $this->routes['POST'][] = $route;
    }

    public function run()
    {

        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            throw new RouterException("Le chemin n'a pas ete trouve");
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route)
        {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }
        //throw new RouterException('Chemin Non Trouve ');
        die("<h1>Chemin Non Trouve</h1>");
    }
}
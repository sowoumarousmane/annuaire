<?php
/**
 * Created by PhpStorm.
 * User: oumarsow
 * Date: 20/10/18
 * Time: 16:25
 */

namespace App\Router;



class Route
{

    private $path;
    private $callable;
    private $matches;

    public function __construct($path,$callable)
    {
        $this->path = trim($path,'/');
        $this->callable = $callable;
    }

    public function  match($url)
    {
        $url = trim($url,'/');
        $path = preg_replace('#:([\w]+)#','([^/]+)',$this->path);
        $regex = "#^$path$#i";
        //var_dump($path);
        if(!preg_match($regex, $url, $matches))
        {
            return false;
        }
        array_shift($matches);
        $this->matches =$matches;
        return true;
        //var_dump($matches);

    }
    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }
}
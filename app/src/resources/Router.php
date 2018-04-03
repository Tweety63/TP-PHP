<?php

namespace App\resources;

use App\routes\Home;
use App\structures\Resource;
use App\features\Runnable;
use App\features\RunnableInterface;
use App\functions as fn;

class Router extends Resource implements RouterInterface, RunnableInterface
{
	use Runnable;

	protected $routes = [];

	public function __construct(iterable $routes = [])
	{
		$this->setRoutes($routes);
	}

	public function setRoutes(iterable $routes) :RouterInterface
	{
		$this->routes = $routes;
		return $this;
	}

	public function getRoutes() :iterable
	{
		return $this->routes;
	}

	protected function runnable_run()
	{
	    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    $appUrl = $this->routes['app']['url'];
	    $path = '/'.ltrim(str_replace($appUrl,'',$url),'/');
        foreach ($this->routes['routes'] as $key => $value) {
            if ( $key == $path) {
                return new $value;
            }
	    }
	    return new Home;
	}
}
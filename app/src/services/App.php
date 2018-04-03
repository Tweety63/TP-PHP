<?php

namespace App\services;

use App\structures\Service;
use App\features\Runnable;
use App\features\RunnableInterface;
use App\resources\Router;
use App\functions as fn;



// la classe App hérite de la classe service ses attributs et ses fonctions
// implements sert à implémenter une interface qui décrit des méthodes
class App extends Service implements AppInterface, RunnableInterface
{
	use Runnable;

	protected function runnable_run()
	{
		try
		{
			$routes = fn\listeFichiers(PATH_CONF);
			$router = new Router($routes);
            echo $router();
		}
		// permet d'attraper l'exception levée si le try ne réussit pas
		catch (\Throwable $exception)
		{
			die(fn\exceptionToHtml($exception));
		}
	}
}
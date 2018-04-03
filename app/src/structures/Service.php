<?php

namespace App\structures;

// une classe abstraite ne peut être instanciée
abstract class Service
{
    // static permet d'accéder à une propriété sans avoir à l'instancier
	protected static $instance;

	public static function getInstance()
	{
	    // la classe ne pouvant être instanciée ce qui suit permet si $instance est non null
        // si il est null alors un l'initialise
		if (!static::$instance) static::$instance = new static;
		return static::$instance;
	}

	protected function __construct() { }

}
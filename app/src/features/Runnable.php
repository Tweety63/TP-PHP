<?php

namespace App\features;

// trait est une classe permettant de définir des méthodes pouvant être utilisées dans d'autres classes sans en hériter
// une classe peut utiliser plusieurs traits
trait Runnable
{
    // iterable attend un type d'objet pouvant être parcouru avec un foreach (un tableau par exemple)
	public function __invoke(iterable ... $params)
	{
		return $this->runnable_run(... $params);
	}

	protected function runnable_run()
	{
		return get_class($this);
	}
}
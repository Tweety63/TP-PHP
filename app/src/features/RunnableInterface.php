<?php

namespace App\features;

interface RunnableInterface
{
	public function __invoke(iterable ... $params); 
}
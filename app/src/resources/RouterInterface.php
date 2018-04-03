<?php

namespace App\resources;

interface RouterInterface
{
	public function __construct(iterable $routes);

	public function setRoutes(iterable $routes) :RouterInterface;

	public function getRoutes() :iterable;
}
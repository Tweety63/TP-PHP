<?php
/**
 * Created by PhpStorm.
 * User: jean-christophe.simo
 * Date: 27/03/2018
 * Time: 09:35
 */

namespace App\routes;

use App\structures\Route;

class Home extends Route
{
    function stringable_stringify(): string
    {
        return 'page d\'accueil : ';
//        return '<h1>On est sur Accueil</h1>';
    }
}
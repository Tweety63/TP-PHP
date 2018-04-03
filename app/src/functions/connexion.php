<?php
/**
 * Created by PhpStorm.
 * User: jean-christophe.simo
 * Date: 27/03/2018
 * Time: 11:58
 */

namespace App\functions;

use App\functions as fn;


function Connexion()
{
    $pdo = null;
    try {
        $dsn = 'mysql:host=localhost;dbname=cgi';
        $params = [
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];
        $pdo = new \PDO(
            $dsn,
            'root',
            'root',
            $params
        );
        $pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    } catch (\PDOException $e) {
        echo fn\exceptionToHtml($e);
    }
    return $pdo;
}

//
//$page = $_GET['page'] ?? 'home';
//$pageFile = $dir.'pages/'.$page.'.php';
//if (is_file($pageFile))
//{
//    include($pageFile);
//}
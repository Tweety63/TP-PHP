<?php
session_start();

use App\services\App;
use App\services\Client;
use App\functions as fn;
// __DIR__ chemin absolu vers le dossier courant
// remplace les \ par des / afin de maximiser la compatibilité entre les OS et contrôle le / de fin
$root   = rtrim(str_replace('\\', '/', dirname(__DIR__))).'/';
$public = $root.'public/';
$src    = $root.'src/';
$conf   = $root.'conf/';
$routes = $root.'routes/';

// define permet de définir des constantes
// dans le cas présent les constantes représentent les chemins des répertoires
define('PATH_ROOT', $root);
define('PATH_PUBLIC', $public);
define('PATH_SRC', $src);
define('PATH_CONF', $conf);
define('PATH_ROUTES', $routes);

// include permet d'inclure une autre page ou un morceau d'une autre page dans la page courante
include($src.'functions/debug.php');
include($src.'functions/listeFichiers.php');
include($src.'functions/connexion.php');
include($src.'functions/password.php');

// fonction utilisateur qui gère les erreurs
set_error_handler('App\functions\errorHandler');

include($src.'features/Runnable.php');
include($src.'features/RunnableInterface.php');
include($src.'features/Stringable.php');
include($src.'features/StringableInterface.php');
include($src.'structures/Resource.php');
include($src.'structures/Route.php');
include($src.'structures/Service.php');
include($src.'resources/RouterInterface.php');
include($src.'resources/Router.php');
include($src.'services/AppInterface.php');
include($src.'services/App.php');
include($src.'services/Client.php');
include($routes.'Home.php');
include($routes.'About.php');
include($routes.'Contact.php');

$pdo = fn\Connexion();

$client = new Client($pdo);

$app = App::getInstance();
$app();
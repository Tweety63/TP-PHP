<?php
/**
 * Created by PhpStorm.
 * User: jean-christophe.simo
 * Date: 21/03/2018
 * Time: 16:30
 */

namespace App\functions;

// static $routes = [];

function listeFichiers($dir)
{
    if (is_dir($dir)) {

        // si il contient quelque chose
        if ($dh = opendir($dir)) {
            // boucler tant que quelque chose est trouvé
            while (($file = readdir($dh)) !== false) {

                // affiche le nom et le type si ce n'est pas un element du systeme
                if ($file != '.' && $file != '..') {
                    if (is_dir($dir . $file)) {
                        $routes[$file] = listeFichiers($dir . '/' . $file . '/');
                    } else {
                        $routes[basename($file, '.conf.json')] = json_decode(file_get_contents($dir . $file),true);
                    }
                }
            }
            // on ferme la connection
            closedir($dh);
        }
    }
    return $routes;
}

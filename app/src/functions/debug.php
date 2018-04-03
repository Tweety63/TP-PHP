<?php

// namespace permet de séparer les espaces de noms
// cela fonctionne un peu comme des dossiers
namespace App\functions;

// fonction permettant de retourner un message précisant le code erreur et où se situe exactement l'erreur
function errorHandler($code, $message, $file, $line)
{
    throw new \Exception("$message - Error from $file, l.$line", $code);
}

// mise en forme du message d'erreur
function exceptionToHtml(\Throwable $exception)
{
    // tout ce qui suit sert à créer le template html affichant l'erreur retournée
    $html  = '<div style="font-family:monospace;color:darkred;background-color:#eae8e4;';
    $html .= 'border:1px solid;padding:1em;margin:1em auto;max-width:500px;word-break:break-all;">';
    $html .= '<h3 style="color:darkred;margin-top:0;">Exception ';
    $html .= '<span style="font-weight:normal">(\\'.get_class($exception).')</span></h3><p>';
    $html .= '<p>'.$exception->getMessage().'</p>';
    $html .= '<p style="color:#885858;margin-bottom:0;font-size:.85em;">Throwed in '.$exception->getFile();
    $html .= ', l.'.$exception->getLine().'</p>';
    $html .= '</div>';

    // getPrevious permet de retourner l'exception précédente
    if ($previous = $exception->getPrevious()) 
        $html = $html.exceptionToHtml($previous);

    return $html;
}
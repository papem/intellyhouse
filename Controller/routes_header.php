<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 26/11/2017
 * Time: 20:21
 */

// Routeur permettant de gérer les actions qui nécessitent d'être placé avant le HEADER HTTP

//Liste des controllers autorisés et de leurs actions
$controllers = array('user' => ['connect', 'disconnect', 'register']);

// On regarde si le controller demandé et son action sont autorisés
// Si quelqu'un essaie d'accéder quelque chose de non autorisé, une page d'erreur sera affiché.
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    }
}

if ($controller == 'pages'){
    switch ($action):
        case 'login':
            $page_title = 'Connexion';
            break;
        case 'home':
            $page_title = 'TECHOUSE';
            break;
        case 'home_user':
            $page_title = 'Ma Maison';
            break;
        case 'error':
            $page_title = 'Erreur';
    endswitch;
}


?>
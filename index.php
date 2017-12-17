<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:36
 */


// Variable pour le reporting d'erreur
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
///


//Création de la session
session_start();


// Chargement de l'accès à la base de donnée
require_once('Model/Database.php');

///
/// Fonction de routing pour les actions des controllers
///

// Routeur permettant de gérer les actions qui nécessitent d'être placé avant le HEADER HTTP

// Définition de la fonction permettant de d'appeler une action issue d'un controller
function call($controller, $action) {

    // chargement du controller
    require_once('Controller/' . $controller . '_controller.php');

    // création d'une nouvelle instance d'un controller
    switch($controller) {
        case 'pages':
            $_controller = new PagesController();
            break;
        case 'user':
            require_once('Model/Users.php');
            $_controller = new UsersController();
            break;
    }

    // Appel de l'action
    $_controller->{ $action }();
}



// Définition du controller et de l'action en fonction des paramètres
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];

} else { // Par default retourner sur la page d'acceuil
    $controller = 'pages';
    $action     = 'home';
}

// Connexion utilisateur
if ((isset($_POST["Email"]) && !empty($_POST["Email"])) && (isset($_POST["Password"]) && !empty($_POST["Password"]))){
   $controller = 'user';
   $action     = 'connect';
}




// Chargement du layout
require_once('View/layout.php');

?>


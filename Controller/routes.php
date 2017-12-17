<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 25/11/2017
 * Time: 14:41
 */

// Routeur permettant de gérer les actions qui nécessitent d'être placé dans le body

  //Liste des controllers autorisés et de leurs actions
  $controllers = array('pages' => ['home', 'error', 'login', 'register_user', 'home_user']);

  // On regarde si le controller demandé et son action sont autorisés
  // Si quelqu'un essaie d'accéder quelque chose de non autorisé, une page d'erreur sera affiché.
  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('pages', 'error');
      }
  }
?>


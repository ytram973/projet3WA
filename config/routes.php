<?php

return [
    'app_home' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'home'
    ],
    'app_contact' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'contact'
    ],
    'app_privacy_policy' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'privacyPolicy'
    ],
    'article_list' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'list'
    ],
    'article_show' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'show'
    ],
    'article_add' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'add'
    ],
    'article_edit' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'edit'
    ],
    'article_delete' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'delete'
    ],
    //? connexion user
    'user_home' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'userhome'//! dois-je mettre un 'home' ici ?
    ],
    'user_register' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'register'
    ],
    'user_login' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'login'
    ],
    'user_logout' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'logout'
    ],


];
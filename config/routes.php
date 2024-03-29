<?php

return [

  /**
   * ? Route pour l'application
   */
    //? Accueil du site avec tous les article que les utilisateur on poster pas ordre DESC
    'app_home' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'home'
    ],
    //todo route a vérifier l'utiliter
    'app_game' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'game'
    ],
    //todo route a vérifier l'utiliter
    'app_privacy_policy' => [
      'controller' => App\Controller\AppController::class,
      'method' => 'privacyPolicy'
    ],

    /**
     * ? Route pour les article
     */
    //todo route a vérifier l'utiliter
    'article_list' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'list'
    ],
    //? afficher un article avec les commentaire 
    //! faire que quand on clic sur un article sa nous redirige sur la page avec 
    //! les commentaire en bas de l'article
    'article_show' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'show'
    ],
    //? ajouter un article
    'article_add' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'add'
    ],
    //? modification d'un article
    'article_edit' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'edit'
    ],
    //? suppression d'un article
    'article_delete' => [
      'controller' => App\Controller\ArticleController::class,
      'method' => 'delete'
    ],

    /**
     * ? Route utilisateur
     */
     //? Profil user
    'user_home' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'userHome'//! dois-je mettre un 'home' ici ?
    ],
     //? Inscription user
    'user_register' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'register'
    ],
     //? Connexion user
    'user_login' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'login'
    ],
    //? Deconnexion user
    'user_logout' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'logout'
    ],
    //? editer un user
    'user_edit' => [
      'controller' => App\Controller\UserController::class,
      'method' => 'edit'
    ],

    'user_like' =>[
      'controller' => App\Controller\UserController::class,
      'method' => 'like'
    ],
    'user_dislike' =>[
      'controller' => App\Controller\UserController::class,
      'method' => 'dislike'
    ],

    /**
     * ? Route commmentaire
     */

    'comment_add' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'add'
    ],

    'comment_edit' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'edit'
    ],

    'comment_delete' => [
      'controller' => App\Controller\CommentController::class,
      'method' => 'delete'
    ],

];
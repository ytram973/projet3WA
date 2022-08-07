<?php

namespace App\Controller;

use Projet\Controller;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\UserManager;
use Projet\Authenticator;


class AppController extends Controller
{


    /**
     * home affiche tous les articles dans la page d'accueil
     * @return void
     */
    public function home(): void
    {

        $auth = new Authenticator();
        $userManager = new UserManager();
        $articleManager = new ArticleManager();

        //? récupère tous les articles
        $articles = $articleManager->findAll();

        //? vérifie si l'article a bien était liker par l'utilisateur connecter

        foreach ($articles as $article) {
            if ($auth->isAuthenticated()) {
                $isLiked = $userManager->checkLike($article);
                $article->setIsLiked($isLiked);
            }
            $nbmLike = $userManager->nbmLike($article);
            $article->setNbmLike($nbmLike);
        }

        $this->renderView('app/home.php', [
            'title' => 'Accueil',
            'articles' => $articles,
        ]);
    }

    public function game(): void
    {
        $this->renderView('app/game.php', [
            'title' => 'Le morpion'
        ]);
    }

    public function privacyPolicy(): void
    {
        $this->renderView('app/privacy_policy.php', [
            'title' => 'Politique de confidentialité'
        ]);
    }
}

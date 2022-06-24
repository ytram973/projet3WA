<?php

namespace App\Controller;

use Projet\Controller;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\UserManager;
use Projet\Authenticator;


class AppController extends Controller {

    
    /**
     * home affiche tous les articles dans la page d'accueil
     * @return void
     */
    public function home(): void {

        $auth = new Authenticator();
        $userManager = new UserManager();
        $articleManager = new ArticleManager();

        //? récupère tous les articles
        $articles = $articleManager->findAll();

        //? vérifie si l'article a bien était liker par l'utilisateur connecter
        if ($auth->isAuthenticated()) {

            foreach ($articles as $article ) {
                $isLiked = $userManager->checkLike($article);
                $nbmLike = $userManager->nbmLike($article);
                $article->setIsLiked($isLiked);
                $article->setNbmLike($nbmLike); 
            }
        }
        
        $this->renderView('app/home.php', [
            'title' => 'Accueil',
            'articles' => $articles,
        ]);
    }

    public function contact(): void {
        $this->renderView('app/contact.php', [
            'title' => 'Contact'
        ]);
    }

    public function privacyPolicy(): void {
        $this->renderView('app/privacy_policy.php', [
            'title' => 'Politique de confidentialité'
        ]);
    }
    
}
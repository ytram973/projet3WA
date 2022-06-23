<?php

namespace App\Controller;

use Projet\Controller;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\UserManager;
use Projet\Authenticator;


class AppController extends Controller {

    public function home(): void {
    //foreach sur $articles pour faire un checklike
        $auth = new Authenticator();
        $userManager = new UserManager();
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();    
        
        if ($auth->isAuthenticated()) {

            foreach ($articles as $article ) {
                $isLiked = $userManager->checkLike($article);
                $article->setIsLiked($isLiked);
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
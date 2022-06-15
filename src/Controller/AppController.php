<?php

namespace App\Controller;

use Projet\Controller;
use App\Model\Manager\ArticleManager;


class AppController extends Controller {

    public function home(): void {
    
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();        
        $this->renderView('app/home.php', [
            'title' => 'Accueil',
            'articles' => $articles
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
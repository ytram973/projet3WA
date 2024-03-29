<?php

namespace App\Controller;

use Projet\Controller;
use App\Model\Entity\Article;
use App\Model\Manager\ArticleManager;
use Projet\Authenticator;

class ArticleController extends Controller {

    //! check si a garder
    public function list(): void {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();
        $this->renderView('article/list.php', [
            'title' => 'Le blog',
            'articles' => $articles
        ]);
    }

    /**
     * fonction show qui permet d'afficher les articles
     *
     * @return void
     */
    public function show(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);
            $this->renderView('article/show.php', [
                'title' => $article->getTitle(),
                'article' => $article
            ]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }
        
    /**
     * fonction add qui permet d'ajouter un article
     * @return void
     */
    public function add(): void { 
        if (isset($_POST) && !empty($_POST)) {
           
            $articleManager = new ArticleManager();
            $article = new Article( $_POST);
            $UserCo = new Authenticator();
           
            $article->setUser($UserCo->getUser());

            $articleManager->add($article);
            $this->redirectToRoute('app_home');
        }
        $this->renderView('article/add.php', [
            'title' => 'Ajouter un article'
        ]);
    }
   
    /**
     * fonction edit qui permet de modifier un article dans la base de données
     * @return void
     */
    public function edit(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);
            if (
                isset($_POST['title'], $_POST['content'])
                && !empty($_POST['title'])
                && !empty($_POST['content'])
            ) {
                $articleManager->edit(new Article($_POST), $_GET['id']);
                $this->redirectToRoute('article_show', ['id' => $_GET['id']]);
            }
            $this->renderView('article/edit.php', [
                'title' => $article->getTitle() . ' (éditer)',
                'article' => $article
            ]);
        } else {
            $this->redirectToRoute('app_show', ['id' => $_GET['id']]);
        }
    }
        
    /**
     * fonction qui supprime un article en fonction de l'id passé en paramètre dans l'url
     * 
     * @return void
     */
    public function delete(): void {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $articleManager->delete($_GET['id']);
            $this->redirectToRoute('user_home');
        } else {
            $this->redirectToRoute('app_show', ['id' => $_GET['id']]);
        }
    }
}
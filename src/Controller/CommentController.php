<?php

namespace App\Controller;

use App\Model\Entity\Article;
use Projet\Controller;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use Projet\Authenticator;

class CommentController extends Controller {
    



    public function add(): void {
        if (isset($_POST) && !empty($_POST)) {
           
            $commentManager = new CommentManager();
            $comment = new Comment($_POST);
            $UserCo = new Authenticator();
           
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);
            
            $comment->setArticle($article);
            $comment->setUser($UserCo->getUser());
            // var_dump($comment);
            

            $commentManager->add($comment);
            $this->redirectToRoute('app_home');
        }
        $this->renderView('comment/add.php', [
            'title' => 'ajouter un comment'
        ]);
    }
}
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

    public function edit(): void{
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            if(
               isset($_POST['text'])
               && !empty($_POST['text']) 
            ){
                $commentManager->edit(new Comment($_POST),$_GET['id']);
                $this->redirectToRoute('article_show',['id'=> $comment->getArticle()->getId()]);
            }
            $this->renderView('comment/edit.php',[
                'title'=> 'edit commentaire',
                'comment'=> $comment
            ]);
        }
    }

    public function delete():void{
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            $commentManager->delete($_GET['id']);
            $this->redirectToRoute('article_show',['id'=> $comment->getArticle()->getId()]);
        } else {
            $this->redirectToRoute('app_home');
        }
    }

}
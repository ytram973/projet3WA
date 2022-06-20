<?php

namespace App\Model\Manager;

use Projet\Manager;
use App\Model\Entity\Article;
use App\Model\Manager\UserManager;
use Projet\Authenticator;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;


class CommentManager extends Manager {



    public function findComments(int $idArticle): array {
        $sql = 'SELECT * FROM comment WHERE comment.id_article = :idArticle';
        $query = $this->connection->prepare($sql);
        $query ->bindValue(':idArticle', $idArticle, \PDO::PARAM_INT);
        $query ->execute();
        $comments = $query->fetchAll();
        if (!$comments || empty($comments)) {
            return null;
        }

        $commentObjects = [];
        $userManager = new UserManager();
        foreach ($comments as $comment) {
            $comment['user'] = $userManager->find($comment['id_user']);
            array_push($commentObjects, new Comment($comment));
        }
        return $commentObjects;
    }




public function add(Comment $comment): void {
    $sql = 'INSERT INTO comment (text, created_at, id_user, id_article) VALUES (:text, :created_at, :id_user, :id_article)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'text' => $comment->getText(),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id_user' => $comment->getUser()->getId(),    
      'id_article' => $comment->getArticle()->getId()

    ]);
  }

}
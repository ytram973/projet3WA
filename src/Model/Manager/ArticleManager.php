<?php

namespace App\Model\Manager;

use Projet\Manager;
use App\Model\Entity\Article;
use App\Model\Manager\UserManager;
use Projet\Authenticator;

class ArticleManager extends Manager {

    public function find(int $id): ?Article {
        $sql = 'SELECT * FROM articles WHERE articles.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
          'id' => $id
        ]);
        $article = $query->fetch();
        if (!$article || empty($article)) {
            return null;
        }
        $commentManager = new CommentManager();
        $userManager = new UserManager();
        
        $article['user'] = $userManager->find($article['id_user']);
        $article['comments'] = $commentManager->findComments($id);
        

        return new Article($article);
    }

    public function findAll(): ?array {
        $sql = 'SELECT * FROM articles ORDER BY created_at DESC';
        $query = $this->connection->query($sql);
        $articles = $query->fetchAll();
        if (!$articles || empty($articles)) {
            return null;
        }
				$articlesObjects = [];
        $userManager = new UserManager();
				foreach ($articles as $article) {
          $article['user'] = $userManager->find($article['id_user']);
						array_push($articlesObjects, new Article($article));
				}
        // var_dump($article);

        return $articlesObjects;
    }

   
    public function findAllPostUser(): ?array {
      $sql = 'SELECT * FROM articles WHERE id_user=:id_user ORDER BY created_at DESC;';
      $query = $this->connection->prepare($sql);
      $auth = new Authenticator;
      $query->execute([
        'id_user' => $auth->getUser()->getId()
      ]);
      $articles = $query->fetchAll();
      if (!$articles || empty($articles)) {
          return null;
      }
      $articlesObjects = [];
      $userManager = new UserManager();
      foreach ($articles as $article) {
        $article['user'] = $userManager->find($article['id_user']);
          array_push($articlesObjects, new Article($article));
      }


      return $articlesObjects;
  }



    public function findLasts(int $nb): ?array {
      $sql = 'SELECT * FROM articles ORDER BY articles.created_at DESC LIMIT :limit';
      $query = $this->connection->prepare($sql);
      $query->execute([
        'limit' => $nb
      ]);
      $articles = $query->fetchAll();
      if (!$articles || empty($articles)) {
          return null;
      }
      $articlesObjects = [];
      $userManager = new UserManager();
      foreach ($articles as $article) {
        $article['user'] = $userManager->find($article['id_user']);
          array_push($articlesObjects, new Article($article));
      }
      return $articlesObjects;
  }

  /**
   * fonction add qui permet d'ajouter un article
   */
  public function add(Article $article): void {
    $sql = 'INSERT INTO articles (title, content, created_at, id_user) VALUES (:title,  :content, :created_at, :id_user)';
    $query = $this->connection->prepare($sql);
    $query->execute([
      'title' => $article->getTitle(),
      'content' => $article->getContent(),
      'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id_user' => $article->getUser()->getId()

    ]);
  }

  /**
   * fonction edit qui permet de modifier un article dans la base de données
   * !modifier le resume et le contenu faute
   */
  public function edit(Article $article, int $id): void {
    $sql = "UPDATE articles SET title = :title,  content = :content, updated_at = :updated_at WHERE id = :id";
    $query = $this->connection->prepare($sql);
  
    $query->execute([
      'title' => $article->getTitle(),
      'content' => $article->getContent(),
      'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
      'id' => $id
    ]);
  }

  /**
   * fonction delete qui permet de supprimer un article dans la base de données
   */
  public function delete(int $id): void {
    $sql = "DELETE FROM articles WHERE id = :id";
    $query = $this->connection->prepare($sql);
    $query->execute([
      'id' => $id
    ]);
  }

}
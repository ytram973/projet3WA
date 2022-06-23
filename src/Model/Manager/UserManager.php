<?php

namespace App\Model\Manager;

use App\Model\Entity\User;
use Projet\Authenticator;
use Projet\Manager;
use App\Model\Entity\Article;

//! le manager permet d'excuter des requêtes SQL
//! pour l'utilisateur

class UserManager extends Manager
{
   //? la fonction add permet d'ajouter un utilisateur dans la base de données

   public function add(User $user): void {
       $sql = 'INSERT INTO user (pseudo, email, password, created_at) VALUES (:pseudo, :email, :password, :created_at)';
       $query = $this->connection->prepare($sql);
       $query->execute([
        'pseudo' => $user->getPseudo(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword(),
        'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
        ]);
}
    //? la fonction findByEmail permet de trouver un utilisateur par son email

    public function findByEmail(string $email): ?User {
        $sql = 'SELECT * FROM user WHERE email = :email';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':email', $email, \PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
        }
        return new User($user);
    }
    //? la focntion find permet de trouver un utilisateur par son id

    public function find(int $id): ?User {
        $sql = 'SELECT * FROM user WHERE user.id = :id';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
				}
				return new User($user);
    }
    
    public function edit(User $user):void{
        $sql = "UPDATE user SET firstname = :firstname,  lastname = :lastname, pseudo = :pseudo WHERE id= :id";
        $query = $this->connection->prepare($sql);

        $query->execute([
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'pseudo' => $user->getPseudo(),
            //! ici donne a la requete id de user qui est connecter
            'id' => $user->getId()
          ]);

    }
    
    public function like(Article $article):void{
        $auth = new Authenticator();
        $sql = "INSERT INTO user_like_article (id_user,id_article) VALUES (:id_user,:id_article)";
        $query = $this->connection->prepare($sql);
        $query->execute([
        'id_user' => $auth->getUser()->getId(),
        'id_article' => $article->getId()
        ]);
    }

    public function dislike(Article $article):void{
        $auth = new Authenticator();
        $sql = "DELETE FROM user_like_article WHERE id_user=:id_user AND id_article = :id_article";
        $query = $this->connection->prepare($sql);
        $query->execute([
        'id_user' => $auth->getUser()->getId(),
        'id_article' => $article->getId()
        ]);
    }
    
    // fonction qui permet de savoir si un utilisateur a liker un article, renvoie vrai si il a liker l'article
    public function checkLike(Article $article){
        $auth = new Authenticator();
        $sql = "SELECT COUNT(*) FROM user_like_article WHERE id_user = :id_user AND id_article = :id_article";
        $query = $this->connection->prepare($sql);
        $query->execute([
        'id_user' => $auth->getUser()->getId(),
        'id_article' => $article->getId()
        ]);

        $result = $query->fetchColumn();

        if($result == 0){
            return false;
        }
        else{
            return true;
        }
    }
}
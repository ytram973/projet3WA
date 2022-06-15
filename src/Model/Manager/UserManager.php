<?php

namespace App\Model\Manager;

use App\Model\Entity\User;
use Projet\Manager;

//! le manager permet d'excuter des requêtes SQL
//! pour l'utilisateur

class UserManager extends Manager
{
   //? la fonction add permet d'ajouter un utilisateur dans la base de données

   public function add(User $user): void {
       $sql = 'INSERT INTO user (pseudo, email, password, created_at) VALUES (:pseudo, :email, :password, :created_at)';
       $query = $this->connection->prepare($sql);
       var_dump('merde');
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
        $query ->bindValue(':id', $id, \PDO::PARAM_INT);
        $query ->execute();
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
				}
				return new User($user);
    }
    
}
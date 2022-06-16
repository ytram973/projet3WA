<?php

namespace App\Model\Entity;


//! l'entité User permet de stocker les données de l'utilisateur pour pouvoir les utiliser dans le code et dans la base de données (enregistrement, connexion, etc.)

class User {
    private int $id;
    private string $firstname;
    private ?string $lastname;
    private string $password;
    private string $email;
    private string $pseudo;
    private \DateTime $created_at;

    public function __construct(?array $user = []){
        if (isset($user['id'])) 
            $this->id = (int) $user['id'];
        if (isset($user['firstname']))
            $this->firstname = (string) $user['firstname'];
        if (isset($user['lastname']))
            $this->lastname = (string) $user['lastname'];
        if (isset($user['password']))
            $this->password = (string) $user['password'];
        if (isset($user['email']))
            $this->email = (string) $user['email'];
        if (isset($user['pseudo']))
            $this->pseudo = (string) $user['pseudo'];
        if (isset($user['created_at']))
            $this->created_at = new \DateTime($user['created_at']);
    }


    public function getId(): int {
        return $this->id;
    }

    public function getFirstname(): string {
        return $this->firstname;
    }

    public function getLastname(): ?string {
        return $this->lastname;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPseudo(): string {
        return $this->pseudo;
    }

    public function getCreatedAt(): \DateTime {
        return $this->created_at;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    public function setCreatedAt(\DateTime $created_at): void {
        $this->created_at = $created_at;
    }
}

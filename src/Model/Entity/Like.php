<?php

namespace App\Model\Entity;


class Like {

    private User $user;
    private Article $article;


    public function __construct(?array $like = []){
        if (isset($like['user']))
            $this->user = (int) $like['user'];
        if (isset($like['id_article']))
            $this->article = (int) $like['article'];
    }

    public function getuser(): User {
        return $this->user;
    }

    public function getarticle(): Article {
        return $this->article;
    }
}
<?php 

namespace App\Model\Entity;

class Comment {

    private int $id;
    private string $text;
    private \DateTime $createdComment;
    private User $user;
    private Article $article;



    public function __construct(?array $comment = []){
        if (isset($comment['id'])) 
            $this->id = (int) $comment['id'];
        if (isset($comment['text']))
            $this->text = (string) $comment['text'];
        if (isset($comment['created_at'])) 
            $this->createdComment = new \DateTime($comment['created_at']);
        if (isset($comment['user']))
            $this->user =  $comment['user'];
        if (isset($comment['article']))
            $this->article =  $comment['article'];

    }

    public function getId(): int {
        return htmlspecialchars($this->id);
    }
    
    public function getText(): string {
        return strip_tags($this->text);
    }

    public function getCreatedComment(): \DateTime {
        return $this->createdComment;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getArticle(): Article {
        return $this->article;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setText(string $text): void {
        $this->text = $text;
    }

    public function setCreatedComment(\DateTime $createdComment): void {
        $this->createdComment = $createdComment;
    }

    public function setUser(User $user): void {
        $this->user = $user;
    }

    public function setArticle(Article $article): void {
        $this->article = $article;
    }



}
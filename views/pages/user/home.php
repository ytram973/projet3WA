<h1>user home</h1>
<a href="index.php?page=user_edit">modifier le profil</a>

<?php if(isset($data['articles'])) foreach ($data['articles'] as $article) { ?>
    
    <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId() ) { ?>
        <a href="index.php?page=article_edit&id=<?= $article->getId() ?>">modifier</a>
        <a href="index.php?page=article_delete&id=<?= $article->getId() ?>">Supprimer</a>
    <?php } ?>

    <a href="index.php?page=article_show&id=<?= $article->getId() ?>">
    <ul>

        <li><?= $article->getUser()->getPseudo() ?></li>
        <li><?= $article->getCreatedAt()->format('d/m/Y') ?></li>
        <li><?= $article->getTitle() ?></li>
        <li><?= $article->getContent() ?></li>
    </ul>
    </a>
<?php } ?>
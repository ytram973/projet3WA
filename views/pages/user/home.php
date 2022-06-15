<h1>user home</h1>

<?php if(isset($data['articles'])) foreach ($data['articles'] as $article) { ?>
    <ul>
<!-- ajouter un bouton modifier qui peut modifi seulment l'article que lutilisateur a poster -->
    <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId() ) { ?>
        <a href="index.php?page=article_edit&id=<?= $article->getId() ?>">modifier</a>
        <a href="index.php?page=article_delete&id=<?= $article->getId() ?>">Supprimer</a>
    <?php } ?>

        <li><?= $article->getUser()->getPseudo() ?></li>
        <li><?= $article->getCreatedAt()->format('d/m/Y') ?></li>
        <li><?= $article->getTitle() ?></li>
        <li><?= $article->getContent() ?></li>
    </ul>
<?php } ?>
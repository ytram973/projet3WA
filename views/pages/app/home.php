<h1>Accueil</h1>


<h2>Derniers articles</h2>

<?php if ($auth->isAuthenticated()) { ?>
    <a href="index.php?page=article_add">ajouter un article</a>
<?php } ?>

<!-- foreach pour recupperer les dernier articles -->

<?php if (isset($data['articles'])) foreach ($data['articles'] as $article) { ?>
    <ul>
        <!-- ajouter un bouton modifier qui peut modifi seulment l'article que lutilisateur a poster -->
        <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId()) { ?>
            <a href="index.php?page=article_edit&id=<?= $article->getId() ?>">modifier</a>
        <?php } ?>
        <a href="index.php?page=article_show&id=<?= $article->getId() ?>">
            <li><?= $article->getUser()->getPseudo() ?></li>
            <li><?= $article->getCreatedAt()->format('d/m/Y') ?></li>
            <li><?= $article->getTitle() ?></li>
            <li><?= $article->getContent() ?></li>

<!-- problem de d'affichage  -->
            <ul>
                <?php if ($auth->isAuthenticated()) { ?>
                    <li><a href="index.php?page=comment_add&id=<?= $article->getId() ?>">comment</a></li>
                    <?php if (!$article->getIsLiked()) { ?>
                        <li><a href="index.php?page=user_like&id=<?= $article->getId() ?>">like</a></li>
                    <?php }else{ ?>
                        <li><a href="index.php?page=user_dislike&id=<?= $article->getId() ?>">dislike</a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </a>
    </ul>
<?php } ?>
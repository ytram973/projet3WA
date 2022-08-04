<h1>Accueil</h1>


<h2>Derniers articles</h2>

<?php if ($auth->isAuthenticated()) { ?>
    <a href="index.php?page=article_add">ajouter un article</a>
<?php } ?>

<!-- foreach pour recupperer les dernier articles -->

<?php if (isset($data['articles'])) { ?>
    <ul id="articles" class="stack">
        <?php foreach ($data['articles'] as $article) { ?>
            <li>
                <article class="stack">
                    <header class="article-header">
                        <div class="columns meta">
                            <span class="pseudo"><?= $article->getUser()->getPseudo() ?></span>
                            <time class="created-at" datetime="<?= $article->getCreatedAt()->format('Y-m-d') ?>"><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
                            <!-- ajouter un bouton modifier qui peut modifier seulment l'article que lutilisateur a poster -->
                            <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId()) { ?>
                                <a href="index.php?page=article_edit&id=<?= $article->getId() ?>">modifier</a>
                            <?php } ?>
                        </div>
                        <h3>
                            <a class="stack" href="index.php?page=article_show&id=<?= $article->getId() ?>">
                                <?= $article->getTitle() ?>
                            </a>
                        </h3>
                    </header>
                    <p><?= $article->getContent() ?></p>

                    <?php if ($auth->isAuthenticated()) { ?>
                        <ul class="columns buttons">
                            <li><a href="index.php?page=comment_add&id=<?= $article->getId() ?>">📨</a></li>
                            <?php if (!$article->getIsLiked()) { ?>
                                <span><?= $article->getNbmLike() ?></span>
                                <li><a href="index.php?page=user_like&id=<?= $article->getId() ?>">❤️</a></li>
                            <?php } else { ?>
                                <span><?= $article->getNbmLike() ?></span>
                                <li><a href="index.php?page=user_dislike&id=<?= $article->getId() ?>">💔</a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </article>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
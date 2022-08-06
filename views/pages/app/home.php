<h1 class="text-center pad-bot">ACCUEIL</h1>


<h2 class="text-center pad-bot">Les Derniers articles publiés</h2>

<?php if ($auth->isAuthenticated()) { ?>

    <p class="text-right pad-bot">Ajouter un article <a href="index.php?page=article_add"><i class="fa-solid fa-plus"></i></a></p>
<?php } ?>

<!-- foreach pour recupperer les dernier articles -->

<?php if (isset($data['articles'])) { ?>
    <ul id="articles" class="stack articles">
        <?php foreach ($data['articles'] as $article) { ?>
            <li>
                <article class="stack">
                    <header class="article-header">
                        <div class="columns meta">
                            <span class="pseudo"><?= $article->getUser()->getPseudo() ?></span>
                            <time class="created-at" datetime="<?= $article->getCreatedAt()->format('Y-m-d') ?>"><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
                            <!-- ajouter un bouton modifier qui peut modifier seulment l'article que lutilisateur a poster -->
                            <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId()) { ?>
                                <a href="index.php?page=article_edit&id=<?= $article->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
                            <li><a href="index.php?page=comment_add&id=<?= $article->getId() ?>"><i class="fa-solid fa-message icon-msg"></i></a></li>
                            <?php if (!$article->getIsLiked()) { ?>
                                <li><span><?= $article->getNbmLike() ?></span></li>
                                <li><a href="index.php?page=user_like&id=<?= $article->getId() ?>"><i class="fa-solid fa-heart heart-color"></i></a></li>
                            <?php } else { ?>
                                <li><span><?= $article->getNbmLike() ?></span></li>                              
                                <li><a href="index.php?page=user_dislike&id=<?= $article->getId() ?>"><i class="fa-solid fa-heart-crack heart-color"></i></a></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </article>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
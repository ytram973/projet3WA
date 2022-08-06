<h1 class="text-center pad-bot"><?= $auth->getUser()->getPseudo() ?></h1>

    
    
   
<p class="text-right pad-bot"><a href="index.php?page=user_edit">modifier le profil</a></p>

<ul id="articles" class="stack articles">
    <?php if (isset($data['articles'])) foreach ($data['articles'] as $article) { ?>
        <li>
            <article class="stack ">
                <header class="article-header ">
                    <div class="columns meta">
                        <span class="pseudo"><?= $article->getUser()->getPseudo() ?></span>
                        <time class="created-at" datetime="<?= $article->getCreatedAt()->format('Y-m-d') ?>"><?= $article->getCreatedAt()->format('d/m/Y') ?></time>
                        <!-- ajouter un bouton modifier qui peut modifier seulment l'article que lutilisateur a poster -->
                        <?php if ($auth->isAuthenticated() && $article->getUser()->getId() == $auth->getUser()->getId()) { ?>
                            <a href="index.php?page=article_edit&id=<?= $article->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?page=article_delete&id=<?= $article->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                        <?php } ?>
                    </div>
                    <h3>
                        <a class="stack" href="index.php?page=article_show&id=<?= $article->getId() ?>">
                            <?= $article->getTitle() ?>
                        </a>
                    </h3>
                </header>
                <p><?= $article->getContent() ?></p>

            </article>
        </li>
    <?php } ?>
</ul>
<section id="articles">
    <article class="stack">

        <h1 class="text-center"><?= htmlspecialchars($data['article']->getTitle()) ?></h1>

        <header class="article-header">
            <div class="columns meta">
                <p>Poster par <?= htmlspecialchars($data['article']->getUser()->getPseudo()) ?></p>
                <?php if ($auth->isAuthenticated() && $data['article']->getUser()->getId() == $auth->getUser()->getId()) { ?>
                    <a href="index.php?page=article_edit&id=<?= htmlspecialchars($data['article']->getId()) ?>" role="button">Modifier</a>
                    <a href="index.php?page=article_delete&id=<?= htmlspecialchars($data['article']->getId()) ?>" role="button">Supprimer</a>
                <?php } ?>
            </div>
            <p>Publié le <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?></p>


        </header>
        <p><?= htmlspecialchars($data['article']->getContent()) ?></p>

    </article>
</section>




<ul class="comments">
<?php if (isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>

   <li class="comment">
    <p> Commentée par <?= $comment->getUser()->getPseudo() ?></p>
    
    <p> <?= $comment->getText() ?> </p>

    <div class="text-center">
    <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>
        <a href="index.php?page=comment_edit&id=<?= htmlspecialchars($comment->getId()) ?>" role="button">Modifier</a>
        <a href="index.php?page=comment_delete&id=<?= htmlspecialchars($comment->getId()) ?>" role="button">Supprimer</a>
    <?php } ?>
    </div>
    </li>

<?php } ?>
</ul>
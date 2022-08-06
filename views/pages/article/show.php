<section id="articles">
    <h1 class="text-center pad-bot "><?= $data['article']->getTitle() ?></h1>
    <article class="stack">


        <header class="article-header">
            <div class="columns meta pad-bot">
                <h3>Poster par <?= htmlspecialchars($data['article']->getUser()->getPseudo()) ?></h3>
                <?php if ($auth->isAuthenticated() && $data['article']->getUser()->getId() == $auth->getUser()->getId()) { ?>
                    <a href="index.php?page=article_edit&id=<?= htmlspecialchars($data['article']->getId()) ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="index.php?page=article_delete&id=<?= htmlspecialchars($data['article']->getId()) ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                <?php } ?>
            </div>
            <p>Publié le <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?></p>


        </header>
        <p><?= htmlspecialchars($data['article']->getContent()) ?></p>

    </article>
</section>




<?php if (isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>
    <ul class="comments">

   <li class="comment">
    <h3> Commentée par <?= $comment->getUser()->getPseudo() ?></h3>
    
    <p> <?= $comment->getText() ?> </p>

    <div class="text-right">
    <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>
        <a href="index.php?page=comment_edit&id=<?= htmlspecialchars($comment->getId()) ?>" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
        <a href="index.php?page=comment_delete&id=<?= htmlspecialchars($comment->getId()) ?>" role="button"><i class="fa-solid fa-trash"></i></a>
    <?php } ?>
    </div>
    </li>

</ul>
<?php } ?>
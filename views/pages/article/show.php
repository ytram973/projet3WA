<h1><?= htmlspecialchars($data['article']->getTitle()) ?></h1>

<p>Publié le <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?></p>
<p>Poster par <?= htmlspecialchars($data['article']->getUser()->getPseudo()) ?></p>

<p><?= htmlspecialchars($data['article']->getContent()) ?></p>

<?php if ($auth->isAuthenticated() && $data['article']->getUser()->getId() == $auth->getUser()->getId()) { ?>
    <a href="index.php?page=article_edit&id=<?= htmlspecialchars($data['article']->getId()) ?>" role="button">Modifier</a>

    <a href="index.php?page=article_delete&id=<?= htmlspecialchars($data['article']->getId()) ?>" class="secondary" role="button">Supprimer</a>
<?php } ?>





<?php if (isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>

    <p> publié par <?= $comment->getUser()->getPseudo() ?></p>
    <p> <?= $comment->getText() ?> </p>


    <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>
        <a href="index.php?page=comment_edit&id=<?= htmlspecialchars($comment->getId()) ?>" role="button">Modifier</a>

        <a href="index.php?page=comment_delete&id=<?= htmlspecialchars($comment->getId()) ?>" class="secondary" role="button">Supprimer</a>

    <?php } ?>

<?php } ?>
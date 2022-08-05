<h1 class="text-center">Le blog</h1>
<?php foreach ($data['articles'] as $article) { ?>
  <article>
    <h3><?= htmlspecialchars($article->getTitle()) ?></h3>
    <p>Publié le <?= htmlspecialchars($article->getCreatedAt()->format('d/m/Y')) ?></p>
    <a href="index.php?page=article_show&id=<?= htmlspecialchars($article->getId()) ?>" role="button">Lire l'article</a>
  </article>
<?php } ?>
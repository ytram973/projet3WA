<h1 class="text-center">Editer un article</h1>

<form id="form" method="POST">

  <div>
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?= htmlspecialchars($data['article']->getTitle()) ?>">
  </div>

  <div>
    <label for="content">contenu</label>
    <textarea name="content" id="content" rows="10"><?= htmlspecialchars($data['article']->getContent()) ?></textarea>

  </div>
  <div class="text-center">
    <button type="submit" value="Mettre à jour">Mettre à jour</button>
  </div>
</form>
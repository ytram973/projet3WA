<h1 class="text-center">Editer un article</h1>
<form id="form" action="" method="POST">
  <label for="title">Titre</label>
  <input type="text" name="title" id="title" value="<?= htmlspecialchars($data['article']->getTitle()) ?>">
  
  <label for="content">contenu</label>
  <textarea name="content" id="content" rows="10"><?= htmlspecialchars($data['article']->getContent()) ?></textarea>
  <button type="submit" value="Mettre à jour">Mettre à jour</button>
</form>
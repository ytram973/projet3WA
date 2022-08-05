<h1 class="text-center">Mofication commentaire</h1>

<form id="form" action="" method="POST">
    <textarea name="text" id="" rows="8"><?= htmlspecialchars($data['comment']->getText()) ?></textarea>
    <button type="submit" value="valider">valider</button>
</form>
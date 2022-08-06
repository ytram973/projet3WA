<h1 class="text-center pad-bot">Mofication commentaire</h1>

<form id="form" method="POST">
    <div>
        <label for="textarea">Modifier votre commentaire</label>
        <textarea name="text" id="textarea" rows="8"><?= htmlspecialchars($data['comment']->getText()) ?></textarea>
    </div>

    <button type="submit" value="valider">valider</button>
</form>
<h1>mofication commentaire</h1>

<form action="" method="POST">
    <textarea name="text" id="">
        <?= htmlspecialchars($data['comment']->getText()) ?>
    </textarea>
    <input type="submit" value="valider">
</form>
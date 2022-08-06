<h1 class="text-center">Connexion</h1>

<!-- Si le formulaire a été envoyé -->
<form id="form" method="POST">
    <?php include '_errors.php' ?>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Se connecter</button>

</form>
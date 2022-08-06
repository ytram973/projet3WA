<div>
  <h1 class="text-center">Inscription</h1>

  <form id="form" method="POST">
    <?php include '_errors.php' ?>

    <label for="pseudo">Pseudo :</label>
    <input type="text" name="pseudo" id="pseudo">

    <label for="email">Adresse email :</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirmer votre mot de passe :</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit">S'inscrire</button>

  </form>
</div>
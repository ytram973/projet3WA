<h1 class="text-center">Modifier le profil</h1>

<form id="form" method="POST">


    <div>
        <label for="pseudo">Nom d’utilisateur</label>
        <input type="text" name="pseudo" id="pseudo" value="<?= $auth->getUser()->getPseudo(); ?>">
    </div>

    <div>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" value="<?= $auth->getUser()->getFirstname(); ?>">
    </div>

    <div>
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" value="<?= $auth->getUser()->getLastname(); ?>">

    </div>
    <div class="text-center">
        <button type="submit" value="valider">valider</button>
    </div>

</form>
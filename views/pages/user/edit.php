<h1 class="text-center">edit profil</h1>

<form  id="form" action="" method="POST">



<label for="pseudo">Nom d’utilisateur</label>
<input type="text" name="pseudo" id="" value="<?= $auth->getUser()->getPseudo();?>">


<label for="firstname">Prénom</label>
<input type="text" name="firstname" id="" value="<?= $auth->getUser()->getFirstname();?>">

<label for="lastname">Nom</label>
<input type="text" name="lastname"  id="" value="<?= $auth->getUser()->getLastname();?>">

<button type="submit" value="valider">valider</button>


</form>
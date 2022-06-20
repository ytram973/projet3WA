<h1>edit profil</h1>

<form action="" method="POST">



<label for="pseudo">pseudo</label>
<input type="text" name="pseudo" id="" value="<?= $auth->getUser()->getPseudo();?>">


<label for="firstname">prénom</label>
<input type="text" name="firstname" id="" value="<?= $auth->getUser()->getFirstname();?>">

<label for="lastname">Nom</label>
<input type="text" name="lastname"  id="" value="<?= $auth->getUser()->getLastname();?>">

<input type="submit" value="valider">


</form>
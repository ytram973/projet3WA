<h1>edit profil</h1>

<form action="" method="POST">



<label for="pseudo">pseudo</label>
<input type="text" name="pseudo" id=""value="<?= $auth->getUser()->getPseudo();?>">


<label for="firstname">prénom</label>
<input type="text" name="firstname" id="">

<label for="lastname">Nom</label>
<input type="text" name="lastname"  id="" >

<input type="submit" value="valider">


</form>
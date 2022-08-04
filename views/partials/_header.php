<header>
    <nav>
        <li><a href="index.php?page=app_home">Home</a>
        <?php if (!$auth->isAuthenticated()) { ?>
        <li><a href="index.php?page=user_login">Connexion</a></li>
        <li><a href="index.php?page=user_register">Inscription</a></li>
        <?php } else { ?>
        <li><a href="index.php?page=user_home"><?= $auth->getUser()->getPseudo(); ?></a></li>
				<li><a href="index.php?page=user_logout">Déconnexion</a></li>
      <?php } ?>

    </nav>
</header>
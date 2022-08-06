<header>
  <nav>
    <ul>
      <li><a href="index.php?page=app_home"><img src="./public/image_statick/Cosmos.jpg " alt="logo du site"></a>
        <?php if (!$auth->isAuthenticated()) { ?>
      <li><a href="index.php?page=user_login">Connexion</a></li>
      <li><a href="index.php?page=user_register">Inscription</a></li>
    <?php } else { ?>
      <li><a href="index.php?page=user_home"><?= $auth->getUser()->getPseudo(); ?></a></li>
      <li><a href="index.php?page=user_logout">Déconnexion</a></li>
    <?php } ?>
    <li>
      <button id="dark-mode-toggle"><i class="fa-solid fa-moon moon" ></i></button>
    </li>
    </ul>
  </nav>
</header>
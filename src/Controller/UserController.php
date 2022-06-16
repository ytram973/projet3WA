<?php

namespace App\Controller;

use Projet\Authenticator;
use Projet\Controller;
use App\Model\Manager\UserManager;
use App\Model\Entity\User;
use App\Model\Manager\ArticleManager;

class UserController extends Controller
{

    /** 
     * ? methode qui affiche tous article que l'utilisateur a poster/ajouter/add
     * ? la methode renvoi le template (user/home.php) et les met dans un tableau assositive 
     * ? ou nous pouront forEache pour afficher les donne de la $data['article']->getId
     * ? les donner de la BDD grace au findAllPostUser.
     */
    public function homeUser(): void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAllPostUser();
        $this->renderView('user/home.php', [
            'title' => 'Mon compte',
            'articles' => $articles
        ]);
    }


    //? inscription de l'utilisateur
    public function register(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $errors[] = 'Veuillez remplir tous les champs';
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Veuillez entrer une adresse email valide';
                }
                $emailLength = strlen($_POST['email']);
                if ($emailLength < 5 || $emailLength > 100) {
                    $errors[] = "L'adresse email doit comporter entre 5 et 100 caractères.";
                }
                if (strlen($_POST['password']) < 8) {
                    $errors[] = "Le mot de passe doit comporter au moins 8 caractères.";
                }
                if ($_POST['password'] !== $_POST['confirm_password']) {
                    $errors[] = 'Les mots de passe ne correspondent pas';
                }
            }

            if (empty($errors)) {
                $manager = new UserManager();
                $alreadyExist = $manager->findByEmail($_POST['email']);
                if ($alreadyExist) {
                    $errors[] = 'Cette adresse email est déjà utilisée';
                } else {
                    $user = new User();
                    $user->setEmail($_POST['email']);
                    $user->setPseudo($_POST['pseudo']);
                    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $user->setPassword($passwordHash);

                    $manager->add($user);
                    $this->redirectToRoute('user_login');
                }
            }
        }
        $this->renderView('user/register.php', [
            'title' => 'Inscription',
            'errors' => $errors
        ]);
    }

    //? connexion de l'utilisateur
    public function login(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                $manager = new UserManager();
                $user = $manager->findByEmail($_POST['email']);
                if (!$user) {
                    $errors[] = "Aucun compte n'est associé à cette adresse email.";
                    var_dump("fromage");
                } elseif (!password_verify($_POST['password'], $user->getPassword())) {
                    $errors[] = "Mauvais mot de passe.";
                }
            }
            // si aucune erreur, on connecte l'utilisateur
            if (empty($errors)) {
                Authenticator::login($user->getId());
                $this->redirectToRoute('user_home'); //redirect a la page home de user
            }
        }
        $this->renderView('user/login.php', [
            'title' => 'Connexion',
            'errors' => $errors
        ]);
    }

    //? deconnexion de l'utilisateur
    public function logout(): void
    {
        Authenticator::logout();
        $this->redirectToRoute('user_login');
    }


    //todo vérifier si la route est bonne
    public function edit():void{
        if (
            //! d'ou sort le nom !!!!!!!!
            isset($_POST['firstname'], $_POST['lastname'],$_POST['pseudo'])
            && !empty($_POST['firstname'])
            && !empty($_POST['lastname'])
            && !empty($_POST['pseudo'])
            ){
                $userManager = new UserManager();
                $user = new User([
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'pseudo' => $_POST['pseudo'],
                    'id' => $_SESSION['user_id']
                ]);
                $userManager->edit($user);
            }
            var_dump($user);
            var_dump(Authenticator::getUser());
            
        
        
        
        $this->renderView('user/edit.php', [
            'title' => 'Modifier le profil',
        ]);

    }
}

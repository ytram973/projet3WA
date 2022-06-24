<?php

namespace Projet;

use Projet\View;
use Projet\Router;

abstract class Controller {
    /**methode qui affiche le template par son chemin dans le dossier `views/pages/.../...` */
    protected function renderView(string $template, array $data = []): void {
        View::renderView($template, $data);
    }
    /**methode qui  fait une redirection par son chemin ecrit dans le `config/routes.php`
     * @return void 
     */
		protected function redirectToRoute(string $name, array $params = []): void {
	      Router::redirectToRoute($name, $params);
    }

}
<?php

namespace src\Controller;

use lib\View\View;
use src\Repository\personneRepository;

class PersonneController {
    public function Afficher() {
        $repository = new personneRepository();
        $personnes = $repository->findAll();
        $view = new View();
        $view->render('Personne/afficher',['personnes' => $personnes]);
        
    }
}
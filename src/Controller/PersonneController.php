<?php

namespace src\Controller;

use src\Repository\personneRepository;

class PersonneController {
    public function Afficher() {
        $repository = new personneRepository();
        $personnes = $repository->findAll();
        var_dump($personnes);
    }
}
<?php

namespace src\Controller;

use lib\Controller\AbstractController;
use lib\View\View;
use src\Entity\personne;
use src\Repository\personneRepository;

class PersonneController extends AbstractController {
    public function Afficher() {
        $repository = new personneRepository();
        $personnes = $repository->findAll();
        $view = $this->View;
        $view->render('Personne/afficher',['personnes' => $personnes]);
        
    }
    public function Modifier(){
        $repository = new personneRepository();
        if(isset($_GET["id"])){
            
            $personne = $repository->findById($_GET["id"]);
            $this->View->render('Personne/modifier',['personne'=>$personne]);
        }
        if (isset($_POST["id"])&&isset($_POST["nom"])&&isset($_POST["prenom"])&&isset($_POST["email"])){
            $personne = new personne($_POST["id"],$_POST["nom"],$_POST["prenom"],$_POST["email"]);
            $repository->update($personne);
        }

    }
    public function Supprimer(){
        $repository = new personneRepository();
        if(isset($_GET["id"])){            
            $personne = $repository->findById($_GET["id"]);
            $repository->delete($personne);            
        }

    }
    public function Ajouter(){
        $repository = new personneRepository();
        if (isset($_POST["nom"])&&isset($_POST["prenom"])&&isset($_POST["email"])){
            $personne = new personne($_POST["nom"],$_POST["prenom"],$_POST["email"]);
            $repository->create($personne);
        }
        $this->View->render("personne/ajouter");

    }
}
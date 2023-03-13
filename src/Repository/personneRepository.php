<?php

namespace src\Repository;

use lib\DB\Connexion;
use PDO;
use PDOException;

class personneRepository {

    private $pdo;

    public function __construct()
    {
        $connexion = new Connexion();
        $pdo = $connexion->getPdo();
        $this->pdo = $pdo;
        
    }

    public function findAll(){
        $pdo = $this->pdo;
        try{
            $stm = $pdo->prepare("select * from personne");
            $stm->execute();
            $personnes = $stm->fetchAll(PDO::FETCH_CLASS,'src\Entity\personne');
            return $personnes;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
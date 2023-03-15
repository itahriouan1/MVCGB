<?php

namespace src\Repository;

use lib\DB\Connexion;
use PDO;
use PDOException;
use src\Entity\personne;

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
    public function findById($id){
        $pdo = $this->pdo;
        try{
            $stm = $pdo->prepare("select * from personne where id=?");
            $stm->execute([$id]);
            $personnes = $stm->fetchAll(PDO::FETCH_CLASS,'src\Entity\personne');
            return $personnes[0];
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function create(personne $personne){
        $pdo = $this->pdo;
        try{
            $stm = $pdo->prepare("insert into personne values(DEFAULT,?,?,?)");
            $stm->execute([$personne->getNom(),$personne->getPrenom(),$personne->getEmail()]);

        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    public function update(personne $personne){
        $pdo = $this->pdo;
        try{
            $stm = $pdo->prepare("update personne set nom=?,prenom=?,email=? where id=?");
            $stm->execute([$personne->getNom(),$personne->getPrenom(),$personne->getEmail(), $personne->getId()]);
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    public function delete(personne $personne){
        $pdo = $this->pdo;
        try{
            $stm = $pdo->prepare("delete from personne where id=?");
            $stm->execute([$personne->getId()]);
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }
}
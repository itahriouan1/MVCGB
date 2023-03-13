<?php

require "vendor/autoload.php";


use src\Repository\personneRepository;

$peronneRepo = new personneRepository();
$personnes=$peronneRepo->findAll();

var_dump($personnes);
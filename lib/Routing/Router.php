<?php

namespace lib\Routing;

class Router{

    public function Request(){
        $path = __DIR__.'\\..\\..\\config\\Routing\\Routes.json';
        $content = file_get_contents($path);
        $Routes = json_decode($content);
        $controllerString ="";
        if(isset($_GET['action'])){
            foreach($Routes as $Route){
                if($Route->action == $_GET['action']){
                    $controllerString = $Route->Controller;
                }
            }
        }
        else{
            foreach($Routes as $Route){
                if($Route->action == '/'){
                    $controllerString = $Route->Controller;
                }
            }
        }
        if($controllerString!=""){
            $controllerTable = explode("::", $controllerString);
            $Controller = 'src\\Controller\\'.$controllerTable[0];
            $Methode = $controllerTable[1];
            $Objet = new $Controller();
            return $Objet->$Methode();
        }
        else{
            echo 'Route not found';
        }
    }

}
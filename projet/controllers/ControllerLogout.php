<?php

require_once('ControllerAccueil.php');

class ControllerLogout extends ControllerAccueil {
    
    public function __construct($url){

        $this->check($url, function (){
            $this->logout();
            $this->generateViewAccueil();
        });
        
    }
    
    private function logout(){
        session_start();
        // SUPPRIME LES TOUTES LES VARIABLES DE LA SESSION
        session_unset();
        // DETRUIE LA SESSION
        session_destroy();
    }
    
}
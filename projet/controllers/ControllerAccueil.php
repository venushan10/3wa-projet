<?php

class ControllerAccueil extends Controller {
    
    private $_saisonManager;
    
    public function __construct($url){


        $this->check($url, function(){
            $this->generateViewAccueil();
        });

        
    }
    
    protected function generateViewAccueil(){
        
        $this->_saisonManager = new SaisonManager;
        $saisons = $this->_saisonManager->getSaisons();
        
        $this->_view = new View('Accueil');
        $this->_view->generate(array('saisons' => $saisons));
        
    }
    
}
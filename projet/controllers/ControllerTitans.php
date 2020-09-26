<?php


class ControllerTitans extends Controller {
    
    private $_titanManager;
    private $_userManager;
    
    public function __construct($url){
        
        $this->_titanManager = new TitanManager;
        $this->_userManager = new UserManager;
        
        $GLOBALS['url'] = $url;
        
        $this->check($url, function(){
            // AFFICHER LA LISTE DES TITANS
            if (count($GLOBALS['url']) == 1 ){
                $this->generateViewTitans();
            }
            
            // AFFICHER UN TITAN SPÉCIFIQUE SI L'ID EST FOURNI
            elseif (count($GLOBALS['url']) == 2 ){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $targetId = $GLOBALS['url'][1];
                $this->generateViewTitan($targetId);
            }
        }, $maxParameters=2);
        
    }
    
    
    private function generateViewTitans(){

        // RECUPÉRER LA LISTE DES TITAN SOUS FORME D'OBJECT
        $this->_titanManager = new TitanManager;
        $titans = $this->_titanManager->getTitans();
        
        // GÉNÉRER LA VIEW GÉNÉRALE DES TITANS
        $this->_view = new View('Titans');
        $this->_view->generate(array('titans' => $titans));
        
    }
    
    
    private function generateViewTitan($titanId){
        
        // RÉCUPERER L'OBJETC TITAN SPÉCIFIQUE
        $titan = $this->_titanManager->getTitan($titanId);
        
        // GÉNÉRER UNE VIEW SPÉCIFIQUE POUR LE TITAN 
        $this->_view = new View('Titan');
        $this->_view->generate(array( 'titan' => $titan));
        
    }
    
    
}
<?php


class ControllerPersos extends Controller {
    
    private $_persoManager;
    private $_userManager;
    
    public function __construct($url){
        
        $this->_persoManager = new PersoManager;
        $this->_userManager = new UserManager;
        
        $GLOBALS['url'] = $url;
        
        $this->check($url, function(){
            // AFFICHER LA LISTE DES PERSO
            if (count($GLOBALS['url']) == 1 ){
                $this->generateViewPersos();
            }
            
            // AFFICHER UN PERSO SPÉCIFIQUE SI L'ID EST FOURNI
            elseif (count($GLOBALS['url']) == 2 ){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $targetId = $GLOBALS['url'][1];
                $this->generateViewPerso($targetId);
            }
        }, $maxParameters=2);
        
    }
    
    
    private function generateViewPersos(){

        // RECUPÉRER LA LISTE DES PERSO SOUS FORME D'OBJECT
        $this->_persoManager = new PersoManager;
        $persos = $this->_persoManager->getPersos();
        
        // GÉNÉRER LA VIEW GÉNÉRALE DES PERSO
        $this->_view = new View('Persos');
        $this->_view->generate(array('persos' => $persos));
        
    }
    
    
    private function generateViewPerso($persoId){
        
        // RÉCUPERER L'OBJETC PERSO SPÉCIFIQUE
        $perso = $this->_persoManager->getPerso($persoId);
        
        // GÉNÉRER UNE VIEW SPÉCIFIQUE POUR LE PERSO 
        $this->_view = new View('Perso');
        $this->_view->generate(array( 'perso' => $perso));
        
    }
    
    
}
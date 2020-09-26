<?php


class ControllerArcs extends Controller {
    
    private $_arcManager;
    
    public function __construct($url){
        
        $this->_arcManager = new ArcManager;
        
        $GLOBALS['url'] = $url;
        
        $this->check($url, function(){
            // AFFICHER LA LISTE DES ARCS
            if (count($GLOBALS['url']) == 1 ){
                $this->generateViewArcs();
            }
            
            elseif (count($GLOBALS['url']) == 2 ){
                
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                // AJOUTER OU METRE À JOUR UN ARC SI L'ADMIN EST CONNCTÉ 
                if ( $GLOBALS['url'][1] == "add" ){
                    
                    if( !empty($_SESSION['userId']) and 
                        $_SESSION['adminAccess'] == 1 and
                        !empty($_POST['number']) and
                        !empty($_POST['name']) and
                        !empty($_POST['text']) ) {

                        $this->_arcManager->addArc($_POST['number'], $_POST['name'], $_POST['text']);
                        $this->generateViewArcs();

                    }
                }
                // SUPPRIMER UN ARC SI L'ADMIN EST CONNCTÉ 
                elseif( $GLOBALS['url'][1] == "remove" ){
                    if ( !empty($_POST['arcId']) and $_SESSION['adminAccess'] == 1 ){
                        $this->_arcManager->removeArc( $_POST['arcId'] );
                        $this->generateViewArcs();
                    }
                }
                // AFFICHER UNE ARC SPÉCIFIQUE SI L'ID EST FOURNI
                else {
                    $targetId = $GLOBALS['url'][1];
                    $this->generateViewArc($targetId);                   
                }
            }
        }, $maxParameters=2);
        
    }
    
    
    private function generateViewArcs(){
        
        // RECUPÉRER LA LISTE DES ARC SOUS FORME D'OBJECT
        $arcs = $this->_arcManager->getArcs();
        
        // GÉNÉRER LA VIEW GÉNÉRALE DES ARCS
        $this->_view = new View('Arcs');
        $this->_view->generate(array('arcs' => $arcs));
        
    }
    
    
    private function generateViewArc($arcId){
        
        // RÉCUPERER L'OBJETC ARC SPÉCIFIQUE
        $arc = $this->_arcManager->getArc($arcId);
        
        // GÉNÉRER UNE VIEW SPÉCIFIQUE POUR L'ARC 
        $this->_view = new View('Arc');
        $this->_view->generate(array( 'arc' => $arc));
        
    }
    
    
}
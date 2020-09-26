<?php

abstract class Controller {
    
    private $_view;
    
    // EXCUTE LA FUNCTION SELEMENT SI LE NOMBRE DE PARAMETRE EST VALIDER
    protected function check($url, $successFunc, $maxParameters=1){
        if ( isset($url) && count($url) > $maxParameters ){
            throw new Exception('Page introuvable');
            
        }
        else {
            $successFunc();
        }
        
    }
    
    
}

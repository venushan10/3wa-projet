<?php

class ControllerTrailers extends Controller {
    
    
    public function __construct($url){
        
        $this->check($url, function(){
            $this->generateViewTrailers();
        });
    
    }
    
    private function generateViewTrailers(){
        
        $this->_view = new View('Trailers');
        $this->_view->generate([]);
        
    }
    
}
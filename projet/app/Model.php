<?php

abstract class Model {
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }
    
    // FUNCTION QUI LANCE TOUT LES "SETTERS" AUTOMATIQUEMENT LORS DE L'INSTANCIATION
    private function hydrate(array $data) {

        foreach($data as $key => $value) {
            
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
}

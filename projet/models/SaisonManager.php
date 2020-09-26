<?php

class SaisonManager extends ModelManager {
    
    public function getSaisons(){
        return $this->getAll('saisons', 'Saison');
    }
}
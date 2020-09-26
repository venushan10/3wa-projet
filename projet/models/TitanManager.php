<?php

class TitanManager extends ModelManager {
    
    public function getTitans(){
        return $this->getAll('titans', 'Perso');
    }
    
    public function getTitan($titanId){
        $var = null;
        $sql = 'SELECT * FROM titans WHERE id=:id';
        $req = $this->getBdd()->prepare($sql);
        $req->execute( [ ':id' => $titanId ] );
        
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var = new Perso($data);
        }
        $req->closeCursor();
        return $var;
    }
    
}
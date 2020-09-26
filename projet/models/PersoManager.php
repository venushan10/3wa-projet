<?php

class PersoManager extends ModelManager {
    
    public function getPersos(){
        return $this->getAll('persos', 'Perso');
    }
    
    public function getPerso($persoId){
        $var = null;
        $sql = 'SELECT * FROM persos WHERE id=:id';
        $req = $this->getBdd()->prepare($sql);
        $req->execute( [ ':id' => $persoId ] );
        
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var = new Perso($data);
        }
        $req->closeCursor();
        return $var;
    }
    
}
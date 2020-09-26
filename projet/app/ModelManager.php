<?php

abstract class ModelManager {
    
    private static $_bdd;
    
    // INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd() {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=sev-03_panchanayagamvenushan_project2;charset=utf8', 'panchanayagamvenushan', '60eb7f6bNWY3ZTE0YjZmNjc2Y2YwYWY5NGM0YTli35fdcd3f');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    
    // RECUPERE LA CONNEXION A LA BDD
    protected function getBdd(){
        if ( self::$_bdd == null ) {
            self::setBdd();
        }
        return self::$_bdd;
    }
    
    // RECUPERE TOUTES LES LIGNES D'UNE TABLE
    // CHAQUE LIGNE EST INSTANCIÉ À UNE CLASSE MODELE
    // RETOURNE LA LISTE OBJECT
    protected function getAll($table, $obj){
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table);
        $req->execute();
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var[] = new $obj($data);
        }
        $req->closeCursor();
        return $var;
    }
    
}
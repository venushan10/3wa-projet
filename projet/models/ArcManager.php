<?php

class ArcManager extends ModelManager {
    
    protected function arcExist($number){
        $sql = 'SELECT * FROM arcs WHERE number=:number';
        $req = $this->getBdd()->prepare($sql);
        $req->execute( [ ':number' => $number ] );
        $data = $req->fetch( PDO::FETCH_ASSOC );
        $req->closeCursor();
        return !empty($data);
    }
    
    protected function updateArc($number, $name, $text){
        $sql = "UPDATE arcs SET name=:name, text=:text WHERE number=:number";
        $req = $this->getBdd()->prepare($sql);
        
        $req->execute([ 
            ':number' => $number,    
            ':name' => $name,    
            ':text' => $text,
        ]);
        $req->closeCursor();
    }
    
    protected function insertArc($number, $name, $text){
        $sql = "INSERT INTO arcs(number, name, text) values(:number, :name, :text)";
        $req = $this->getBdd()->prepare($sql);
            
        $req->execute([
            ':number' => $number, 
            ':name' => $name, 
            ':text' => $text
            ]);
        $req->closeCursor();
    } 
    
    public function getArcs(){
        return $this->getAll('arcs', 'Arc');
    }
    
    public function getArc($arcId){
        $var = null;
        $sql = 'SELECT * FROM arcs WHERE id=:id';
        $req = $this->getBdd()->prepare($sql);
        $req->execute( [ ':id' => $arcId ] );
        
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var = new Arc($data);
        }
        $req->closeCursor();
        return $var;
        
        
    }
    
    public function addArc($number, $name, $text){
            
        $test = $this->arcExist($number);
        
        if(  $test == true ){
            $this->updateArc($number, $name, $text);
        }
        
        else {
            $this->insertArc($number, $name, $text);
        }


    }
    
    public function removeArc($id){
        $sql = 'DELETE FROM arcs WHERE id=:id';
        $req = $this->getBdd()->prepare($sql);
        $req->execute( [ ":id" => $id ] );
        $req->closeCursor();
    }
    
}
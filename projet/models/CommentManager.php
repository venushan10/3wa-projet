<?php

class CommentManager extends ModelManager {
    
    
    public function getComments($category, $targetId){
        $var = [];
        $sql = 'SELECT * FROM comments WHERE category=:category AND targetId=:targetId';
        $req = $this->getBdd()->prepare($sql);
        
        $req->execute([
            ':category' => $category,
            ':targetId' => $targetId
        ]);
        
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var[] = new Comment($data);
        }
        $req->closeCursor();
        return $var;        

    }
    
    public function addComment($userId, $category, $targetId, $text){
        $sql = "INSERT INTO comments(userId, category, targetId, time, text) values(:userId, :category, :targetId, :time, :text)";
        $req = $this->getBdd()->prepare($sql);
        
        $req->execute([
            ':userId' => $userId, 
            ':category' => $category, 
            ':targetId' => $targetId, 
            ':time' => date("Y-m-d H:i:s"), 
            ':text' => $text
        ]);
        
    }
    
    public function countComments($category, $targetId){
        
        $sql = 'SELECT COUNT(*) FROM comments WHERE category=:category AND targetId=:targetId';
        $req = $this->getBdd()->prepare($sql);

        $req->execute([
            ':category' => $category,
            ':targetId' => $targetId
        ]);
        
        $data = $req->fetch( PDO::FETCH_ASSOC );
        $req->closeCursor();
        return $data['COUNT(*)'];
        
    }
    
}
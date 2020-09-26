<?php

class UserManager extends ModelManager {
    
    public function register($pseudo, $name, $lastName, $email, $password){
        
        $sql = "INSERT INTO users(pseudo, name, lastName, email, hashedPwd, adminAccess) values(:pseudo, :name, :lastName, :email, :hashedPwd, :adminAccess)";
        $req = $this->getBdd()->prepare($sql);
            
        $req->execute([
            ':pseudo' => $pseudo, 
            ':name' => $name, 
            ':lastName' => $lastName, 
            ':email' => $email, 
            ':hashedPwd' => password_hash($password, PASSWORD_DEFAULT),
            ':adminAccess' => 0
        ]);
        $req->closeCursor();
    }
    
    function getFromId($userId){
        $var = null;
        $req = $this->getBdd()->prepare('SELECT * FROM users WHERE id=:id');
        $req->execute( [ ":id" => $userId ] );
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var = new User($data);
        }
        $req->closeCursor();
        return $var;
    }
    
    public function getFromEmail($email){
        $var = null;
        $req = $this->getBdd()->prepare('SELECT * FROM users WHERE email=:email');
        $req->execute( [ ":email" => $email ] );
        while ( $data = $req->fetch( PDO::FETCH_ASSOC ) ) {
            $var = new User($data);
        }
        $req->closeCursor();
        return $var;
    }
    
}
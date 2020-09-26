<?php

class User extends Model {
    
    private $_id;
    private $_name;
    private $_lastName;
    private $_pseudo;
    private $_email;
    private $_hashedPwd;
    private $_adminAccess;
    
    
    // SETTERS
    public function setId($id) {
        $id = (int) $id;
        if($id>0){
            $this->_id = $id;
        }
    }
    
    public function setName($name) {
        if(is_string($name)){
            $this->_name = $name;
        }
    }
    
    public function setLastName($lastName) {
        if(is_string($lastName)){
            $this->_lastName = $lastName;
        }
    }
    
    public function setPseudo($pseudo) {
        if(is_string($pseudo)){
            $this->_pseudo = $pseudo;
        }
    }
    
    public function setEmail($email) {
        if(is_string($email)){
            $this->_email = $email;
        }
    }
    
    public function setHashedPwd($hashedPwd) {
        if(is_string($hashedPwd)){
            $this->_hashedPwd = $hashedPwd;
        }
    }
    
    public function setAdminAccess($adminAccess) {
        $adminAccess = (int) $adminAccess;
        if($adminAccess>0){
            $this->_adminAccess = $adminAccess;
        }
    }
    
    //GETTERS
    public function id() {
        return $this->_id;
    }
    
    public function name() {
        return $this->_name;
    }
    
    public function lastName() {
        return $this->_lastName;
    }
    
    public function pseudo() {
        return $this->_pseudo;
    }
    
    public function email() {
        return $this->_email;
    }
    
    public function hashedPwd() {
        return $this->_hashedPwd;
    }
    
    public function adminAccess() {
        return $this->_adminAccess;
    }
    
}
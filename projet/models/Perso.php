<?php

class Perso extends Model {
    
    private $_id;
    private $_name;
    private $_info;
    private $_img;
    
    
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
    
    public function setInfo($info) {
        if(is_string($info)){
            $this->_info = $info;
        }
    }
    
    public function setImg($img) {
        if(is_string($img)){
            $this->_img = $img;
        }
    }
    
    //GETTERS
    public function id() {
        return $this->_id;
    }
    
    public function name() {
        return $this->_name;
    }
    
    public function info() {
        return $this->_info;
    }
    
    public function img() {
        return $this->_img;
    }
    
}
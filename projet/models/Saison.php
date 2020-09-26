<?php

class Saison extends Model {
    
    private $_id;
    private $_number;
    private $_img;
    private $_info;
    
    
    // SETTERS
    public function setId($id) {
        $id = (int) $id;
        if($id>0){
            $this->_id = $id;
        }
    }
    
    public function setNumber($number) {
        $number = (int) $number;
        if($number>0){
            $this->_number = $number;
        }
    }
    
    public function setImg($img) {
        if(is_string($img)){
            $this->_img = $img;
        }
    }
    
    public function setInfo($info) {
        if(is_string($info)){
            $this->_info = $info;
        }
    }
    
    //GETTERS
    public function id() {
        return $this->_id;
    }
    
    public function number() {
        return $this->_number;
    }
    
    public function img() {
        return $this->_img;
    }
    
    public function info() {
        return $this->_info;
    }
    
}
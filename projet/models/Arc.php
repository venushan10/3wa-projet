<?php

class Arc extends Model {
    
    private $_id;
    private $_number;
    private $_name;
    private $_text;
    


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
    
    public function setName($name) {
        if(is_string($name)){
            $this->_name = $name;
        }
    }
    
    public function setText($text) {
        if(is_string($text)){
            $this->_text = $text;
        }
    }
    
    //GETTERS
    public function id() {
        return $this->_id;
    }
    
    public function number() {
        return $this->_number;
    }
    
    public function name() {
        return $this->_name;
    }
    
    public function text() {
        return $this->_text;
    }
    
}
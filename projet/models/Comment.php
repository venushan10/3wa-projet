<?php

class Comment extends Model {
    
    private $_id;
    private $_userId;
    private $_targetId;
    private $_category;
    private $_time;
    private $_text;
    
    
    // SETTERS
    public function setId($id) {
        $id = (int) $id;
        if($id>0){
            $this->_id = $id;
        }
    }
    
    public function setUserId($userId) {
        $userId = (int) $userId;
        if($userId>0){
            $this->_userId = $userId;
        }
    }
    
    public function setTargetId($targetId) {
        $targetId = (int) $targetId;
        if($targetId>0){
            $this->_targetId = $targetId;
        }
    }
    
    public function setTime($time) {
        if(is_string($time)){
            $this->_time = $time;
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
    
    public function userId() {
        return $this->_userId;
    }
    
    public function targetId() {
        return $this->_targetId;
    }
    
    public function category() {
        return $this->_category;
    }
    
    public function time() {
        return $this->_time;
    }
    
    public function text() {
        return $this->_text;
    }
    
}
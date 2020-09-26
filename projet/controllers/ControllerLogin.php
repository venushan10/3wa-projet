<?php

require_once('ControllerAccueil.php');

class ControllerLogin extends ControllerAccueil {
    
    private $_userManager;
    
    public function __construct($url){
        
        $this->check($url, function (){
            // FAIRE LA CONNECTION DE L'UTILISATEUR
            if ( isset($_POST['email']) and isset($_POST['password']) ) {
                $this->login($_POST['email'], $_POST['password']);
            }
            // GENERER LA VIEW POUR SE CONNECTER
            else{
                $this->generateViewLogin();
            }
        });

    }
    
    
    private function generateViewLogin(){
        $this->_view = new View('Login');
        $this->_view->generate([]);
    }
    
    
    protected function login($email, $pwd){
        $this->_userManager = new UserManager;
        $user = $this->_userManager->getFromEmail($email);
        
        if ( $user == null ) {
            throw new Exception('Email not found');
        }
        else {
            $test = password_verify($pwd, $user->hashedPwd());
            
            if ( $test == true ){
                
                session_start();
                $_SESSION['userId'] = $user->id();
                $_SESSION['user'] = $user->pseudo();
                $_SESSION['adminAccess'] = $user->adminAccess();
                
                $this->generateViewAccueil();
            }
            else {
                throw new Exception('Wrong password');
            }
        }
    }
    
}
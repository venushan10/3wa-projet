<?php

require_once('ControllerLogin.php');

class ControllerRegister extends ControllerLogin {

    public function __construct($url){
        // FAIRE L'INSCRIPTION DE L'UTILISATEUR
        $this->check($url, function(){
            if ( isset($_POST['pseudo']) and
                 isset($_POST['name']) and
                 isset($_POST['lastName']) and 
                 isset($_POST['email']) and 
                 isset($_POST['password'])) {
                     
                $this->register($_POST['pseudo'], $_POST['name'], $_POST['lastName'], $_POST['email'], $_POST['password']);
                
            }
            // AFFICHER LA VIEW POUR S'INSCRIRE
            else{
                $this->generateViewRegister();
            }
        });

        
    }
    
    private function generateViewRegister(){
        $this->_view = new View('Register');
        $this->_view->generate([]);
    }
    
    private function register($pseudo, $name, $lastName, $email, $password){
        $this->_userManager = new UserManager;
        $user = $this->_userManager->register($pseudo, $name, $lastName, $email, $password);
        $this->login($email, $password);
    }
    
    
}
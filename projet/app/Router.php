<?php


class Router {
    
    private $_ctrl;
    private $_view;
    
    public function routeReq() {
        
        try {
            // CHARGEMENT AUTOMATIQUE DES CLASSES MODELES
            spl_autoload_register(function($class) {
                $file = 'models/'.$class.'.php';
                if(file_exists($file)) {
                    require_once($file);;
                }
            });
            
            $url = null;
            
            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if ( isset($_GET['url']) ) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)) {
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else {
                    throw new Exception('Page introuvable');
                }
            }
            else {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
                
            }
            
        }
        // GESTION DES ERREURS
        catch(exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate( array('errorMsg' => $errorMsg) );
        }
        
    }
}

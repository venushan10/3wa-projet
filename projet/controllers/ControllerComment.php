<?php


class ControllerComment extends Controller {
    
    private $_commentManager;
    private $_userManager;
    
    public function __construct($url){
        
        $this->_commentManager = new CommentManager;
        $this->_userManager = new UserManager;
        
        $GLOBALS['url'] = $url;
        
        $this->check($url, function(){
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                
                if ( count($GLOBALS['url']) == 2 ) {
                    // RECUPERER LES COMMENTAIRES D'UNE CIBLE
                    if ( $GLOBALS['url'][1] == "get" ) {
                        if ( !empty($_POST['category']) and !empty($_POST['targetId']) ) {
                            $this->printComments($_POST['category'], $_POST['targetId']);
                        }
                        
                    }
                    
                    // AJOUTER UN COMMENTAIRE SI L'UTILISATEUR EST CONNECTER
                    elseif ( $GLOBALS['url'][1] == "post" ) {
                        
                        if ( !empty($_SESSION['userId']) and !empty($_POST['category']) and !empty($_POST['targetId']) and !empty($_POST['comment']) ) {
                            $this->_commentManager->addComment($_SESSION['userId'], $_POST['category'], $_POST['targetId'], $_POST['comment']);
                        }
                    
                    }
                    // AFFICHER LE NOMBRE DE COMMENTAIRES POUR CHAQUE CIBLE
                    elseif ( $GLOBALS['url'][1] == "count" ){
                        if ( !empty($_POST['category']) and !empty($_POST['targetId']) ) {
                            $this->printCommentCount($_POST['category'], $_POST['targetId']);
                        }
                    }
                    
                }



        }, $maxParameters=2);
        
    }
    
    // AFFICHER LES COMMENTAIRES SOUS FORM JSON POUR LES RECUPERER DANS JAVASCRIPT
    function printComments($category, $targetId){
        $list = $this->_commentManager->getComments($category, $targetId);
        
        $comments = [];
        foreach( $list as $obj ){
            
            $user = $this->_userManager->getFromId( $obj->userId() );
            
            array_push($comments, [
                "pseudo" => $user->pseudo(),
                "text" => $obj->text(),
                "time" => $obj->time(),
            ]);
        }
        
        echo json_encode($comments);
    }
    
    // AFFICHER LE NOMBRE DE COMMENTAIRES SOUS FORM JSON
    function printCommentCount($category, $targetId){
        $number = $this->_commentManager->countComments($category, $targetId);
        echo json_encode( $number );
    }
    
}
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>


<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    	<title><?= $title ?></title>
    	<link rel="icon" type="image/png" href="<?= URL_PUBLIC . 'img/favicon.png' ?>" />
    	<link rel="stylesheet" type="text/css" href="<?= URL_PUBLIC . 'css/global.css' ?>">
    </head>
    
    <header>
            <div class="container">
                <div class="ligne m-colonne space-between hcenter">
                    
                    <div class="logo m-colonne w20 m-w100 center">
                        <a href='<?= URL ?>'><img src="<?= URL_PUBLIC . 'img/logo.png' ?>"></a>
                    </div>
                    
                    <nav class="ligne m-colonne w80 m-w100 center">
                        
                        <a href="<?= URL ?>">Accueil</a>
                        
                        <div class="onglet-list">
                            <p>Univers</p>
                            <ul>
                                <li><a href="<?= URL . "persos" ?>">Personnages</a></li>
                                <li><a href="<?= URL . "titans" ?>">Titans</a></li>
                            </ul>
                        </div>
                        
                        <a href="<?= URL . "arcs" ?>">Arcs</a>
                        <a href="<?= URL . "trailers" ?>">Trailers</a>
                        
                        <?php if( isset($_SESSION['user']) ): ?>
                            <a href="<?= URL . "logout" ?>">Deconnexion</a>
                            <p class="userName">Bonjour <?= $_SESSION['user'] ?></p>
                        <?php  else : ?>
                            <a href="<?= URL . "login" ?>">Connexion</a>
                            <a href="<?= URL . "register" ?>">Inscription</a>
                        <?php endif; ?>
                        
                    </nav>
                    
                </div>
            </div>
    </header>
    
     
    <!------------------------------------- CONTENU DYNAMIQUE -->

    <body style="cursor:url(<?= URL_PUBLIC . 'img/cursor.cur'?>), auto;background-image:url(<?= URL_PUBLIC . 'img/background.png'?>);">
        <?= $content ?>
    </body>
    
    
    
    
    
    
    
    <footer>
        <div class="container">
            <div class="ligne m-colonne">
                <div class="colonne w50 m-w100">
                    <h2>A PROPOS</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="colonne w50 m-w100">
                    <h2>SUIVEZ-NOUS</h2>
                    <div class="row center contact">
                        <a href="https://twitter.com/explore" ><img src="<?= URL_PUBLIC . 'img/contact/twitter.svg' ?>"></a>
                        <a href="https://www.facebook.com/"><img src="<?= URL_PUBLIC . 'img/contact/facebook.svg' ?>"></a>
                        <a href="https://www.pinterest.fr/"><img src="<?= URL_PUBLIC . 'img/contact/pinterest.svg' ?>"></a>
                        <a href="https://fr.linkedin.com/"><img src="<?= URL_PUBLIC . 'img/contact/linkedin.svg' ?>"></a>
                        <a href="https://discord.com/"><img src="<?= URL_PUBLIC . 'img/contact/discord.svg' ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
</html>

<!----------------------------------------- SCRIPTS -->
<script type="text/javascript" src="<?= URL_PUBLIC . 'js/main.js' ?>"></script>
<script type="text/javascript" src="<?= URL_PUBLIC . 'js/comment.js' ?>"></script>
<script type="text/javascript" src="<?= URL_PUBLIC.'js/accueil.js' ?>" ></script>
<script type="text/javascript" src="<?= URL_PUBLIC . 'js/arcs.js' ?>"></script>

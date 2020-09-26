<?php

$this->_title = 'Connexion';


?>

<div class="login">
    <div class="container">
        <form method="POST" action="login">
            
            <label for="email">Email</label>
            <input type="email" name="email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
            
            <input type="submit" value="Connexion"/>
            
        </form>
    </div>
</div>
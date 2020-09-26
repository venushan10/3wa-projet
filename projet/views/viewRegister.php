<?php

$this->_title = 'Connexion';


?>

<div class="register">
    <div class="container">
        <form method="POST" action="register">
            
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" required>

            <label for="name">Prénom</label>
            <input type="text" name="name" required>
            
            <label for="lastName">Nom</label>
            <input type="text" name="lastName" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" required>
            
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
            
            <input type="submit" value="Inscription"/>
            
        </form>
    </div>
</div>
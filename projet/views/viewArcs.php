<?php

$this->_title = 'Arcs';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<?php if( !empty($_SESSION['userId']) and $_SESSION['adminAccess'] == 1 ): ?>
    <div id="arcEdit">
        <div class="container center">
            <form class="colonne center" action="arcs/add" method="POST">
                
                <h2>Ajouter / Modifier un arc</h2>
            
                <label for="number">Numéro</label>
                <input type="number" name="number" autocomplete="off" required />
                
                <label for="name">Titre</label>
                <input type="text" name="name" autocomplete="off" required />
                
                <label for="text">Résumé</label>
                <input type="textarea" name="text" autocomplete="off" required/>
            
                <input type="submit" value="valider" />
            </form>
        </div>
    </div>
<?php endif; ?>

<div class="arcs">
    <div class="container">
        
        <?php foreach ($arcs as $arc): ?>
            <div class="arc target" data-id="<?= htmlspecialchars($arc->id()) ?>" data-category="arc">
                
                <h2><?= htmlspecialchars($arc->name()) ?></h2>
                <h3>Numéro : <span><?= htmlspecialchars($arc->number()) ?></span></h3>
                <p><?= htmlspecialchars($arc->text()) ?></p>
                <p class="countComment">Nombre de commentaires : <span></span></p>
                <a class="bttn hover" href="<?= URL . 'arcs/' . htmlspecialchars($arc->id()) ?>" >En savoir +</a>
                
                <?php if( !empty($_SESSION['userId']) and $_SESSION['adminAccess'] == 1 ): ?>
                    <div class="targetEdit bttn hover">Modifier</div>
                    <div class="targetRemove bttn hover">supprimer</div>
                <?php endif; ?>
                
            </div>
        <?php endforeach ?>
        
    </div>
</div>


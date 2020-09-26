<?php

$this->_title = 'Perso';

?>

<div class="persos">
    <div class="container">
        
        <div id="targetSelected" class="ligne m-colonne perso" data-id="<?= htmlspecialchars($perso->id()) ?>" data-category="perso">
                <div class="colonne w20 m-w100 img center">
                    <img src="<?= URL_PUBLIC . 'img/persos/' . htmlspecialchars($perso->img()) ?>">
                </div>
                <div class="colonne w80 m-w100 desc">
                    <h2><?= htmlspecialchars($perso->name()) ?></h2>
                    <p><?= htmlspecialchars($perso->info()) ?></p>
                </div>
        </div>
        
    </div>
</div>


<?php include 'views/comments.php' ?>

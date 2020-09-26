<?php

$this->_title = 'Personnages';

?>

<div class="persos">
    <div class="container">
        
        <?php foreach ($persos as $perso): ?>
            <div class="ligne m-colonne perso target" data-id="<?= htmlspecialchars($perso->id()) ?>" data-category="perso">
                <div class="colonne w20 m-w100 img center">
                    <img src="<?= URL_PUBLIC . 'img/persos/' . htmlspecialchars($perso->img()) ?>">
                </div>
                <div class="colonne fstart w80 m-w100 desc">
                    <h2><?= htmlspecialchars($perso->name()) ?></h2>
                    <p><?= htmlspecialchars($perso->info()) ?></p>
                    <p class="countComment">Nombre de commentaires : <span></span></p>
                    <a class="bttn hover" href="<?= URL . 'persos/' . htmlspecialchars($perso->id()) ?>" >En savoir +</a>
                </div>

            </div>
        <?php endforeach ?>
        
    </div>
</div>
<?php

$this->_title = 'Titans';

?>

<div class="persos">
    <div class="container">
        
        <?php foreach ($titans as $titan): ?>
            <div class="ligne m-colonne perso target" data-id="<?= htmlspecialchars($titan->id()) ?>" data-category="titan">
                <div class="colonne w20 m-w100 img center">
                    <img src="<?= URL_PUBLIC . 'img/titans/' . htmlspecialchars($titan->img()) ?>">
                </div>
                <div class="colonne w80 fstart m-w100 desc">
                    <h2><?= htmlspecialchars($titan->name()) ?></h2>
                    <p><?= htmlspecialchars($titan->info()) ?></p>
                    <p class="countComment">Nombre de commentaires : <span></span></p>
                    <a class="bttn hover" href="<?= URL . 'titans/' . htmlspecialchars($titan->id()) ?>" >En savoir +</a>
                </div>

            </div>
        <?php endforeach ?>
        
    </div>
</div>
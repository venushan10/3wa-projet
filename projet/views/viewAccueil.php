<?php

$this->_title = 'Attack on Titan';

?>


<div class="affiche">

    <div class="posters">
    <?php foreach($saisons as $saison): ?>
        <div class="saison">
            
            <div class="center">
                <img src="<?= URL_PUBLIC .'img/saisons/' .htmlspecialchars($saison->img()) ?>">
            </div>
            
            <h2>Saison <?= htmlspecialchars($saison->number()) ?></h2>
            
        </div>
    <?php endforeach; ?>
    </div>
    
    <div class="row center nav">
        <a href="#" class="prev">❮ Prev</a>
        <a href="#" class="next">Next ❯</a>
    </div>

</div>


<div class="synopsis">
    <div class="container">
        <div class="ligne m-colonne">
            <div class="colonne w70 m-w100">
                <h2>Synopsis</h2>
                <p>L’histoire tourne autour du personnage d’Eren Jäger dans un monde où l’humanité vit entourée d’immenses murs pour se protéger de créatures gigantesques, les Titans. Le récit raconte le combat mené par l’humanité pour reconquérir son territoire, en éclaircissant les mystères liés à l’apparition des Titans.</p>
            </div>
            <div class="colonne w30 m-w100">
                <img src="<?= URL_PUBLIC.'img/op.jpg' ?>">
            </div>
        </div>
    </div>
</div>


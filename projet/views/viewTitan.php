<?php

$this->_title = 'Perso';

?>

<div class="persos">
    <div class="container">
        
        <div id="targetSelected" class="ligne m-colonne perso" data-id="<?= htmlspecialchars($titan->id()) ?>" data-category="titan">
            <div class="colonne w20 m-w100 img center">
                <img src="<?= URL_PUBLIC . 'img/titans/' . htmlspecialchars($titan->img()) ?>">
            </div>
            <div class="colonne w80 m-w100 desc">
                <h2><?= htmlspecialchars($titan->name()) ?></h2>
                <p><?= htmlspecialchars($titan->info()) ?></p>
            </div>

        </div>
            
        
    </div>
</div>


<?php include 'views/comments.php' ?>

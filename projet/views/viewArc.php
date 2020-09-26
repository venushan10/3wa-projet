<?php

$this->_title = 'Arc';

?>

<div class="arcs">
    <div class="container">
        
        <div id="targetSelected" class="arc" data-id="<?= htmlspecialchars($arc->id()) ?>" data-category="arc">
            <h2><?= htmlspecialchars($arc->name()) ?></h2>
            <p><?= htmlspecialchars($arc->text()) ?></p>
        </div>
        
    </div>
</div>


<?php include 'views/comments.php' ?>
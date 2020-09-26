<?php

$this->_title = 'Trailers';

?>

<div class="trailers">
    <div class="container">

        <div class="trailer">
          <h2>Trailer 1</h2>
          <video width="700" height="500" controls>
            <source src="<?= URL_PUBLIC . 'video/1.mp4' ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        
        <div class="trailer">
          <h2>Trailer 2</h2>
          <video width="700" height="500" controls>
            <source src="<?= URL_PUBLIC . 'video/2.mp4' ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        
        <div class="trailer">
          <h2>Trailer 3</h2>
          <video width="700" height="500" controls>
            <source src="<?= URL_PUBLIC . 'video/3.mp4' ?>" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        </div>
        
    </div>
</div>
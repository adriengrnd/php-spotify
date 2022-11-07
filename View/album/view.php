<?php
use App\Autoloader;
use App\Entity\Artist;
use App\Entity\Album;
?>

<div class="d-flex justify-content-center">
    <?= $result['album']->displayLarge();?>
</div>


<ul class="list-group list-group-light">
    <?php
    foreach ($result['tracks'] as $track){
        echo $track->display();
    }
    ?>
</ul>
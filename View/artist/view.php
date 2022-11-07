<?php
use App\Autoloader;
use App\Entity\Artist;
use App\Entity\Album;
?>

<div class="container">

    <?= $result['artist']->displayLarge();?>

</div>

<div class="card-group">
    <div class="row">
        <?php
        foreach ($result['albums'] as $album){
            echo $album->display();
        }
        ?>
    </div>
</div>
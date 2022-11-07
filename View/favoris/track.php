
<h1 class="fs-1 fst-italic text-success m-3">Mes sons favoris</h1>

<ul class="list-group list-group-light">
    <?php
    foreach ($tracks as $track){
        echo $track->displayFav();
    }
    ?>
</ul>
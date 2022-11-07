
<h1 class="fs-1 fst-italic text-success m-3">Mes artistes favoris</h1>

<div class="container">
    <div class="row">
        <?php foreach ($artistes as $artiste){
            echo $artiste->displayFav();
        }?>
    </div>
</div>

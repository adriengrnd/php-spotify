
<?php
use App\Autoloader;
use App\Entity\Artist;
?>
<form action="/artist/index/" method="get" class="mb-4">
    <label class="form-label" for="name">Nom de l'artiste</label>
    <input type="text" class="form-control" id="name" name="name">
    <input type="submit"  class="btn btn-success btn-sm" value="Rechercher">
</form>

<div class="w100 container-fluid">
    <div class="row">
        <?php
        foreach ($result["artists"]->artists->items as $a) {
            $image = "https://upload.wikimedia.org/wikipedia/commons/c/ca/CD-ROM.png";
            if(!empty(($a->images))){
                $image=$a->images[0]->url;
            }
            $artist = new Artist($a->id,$a->name,$a->followers->total,$a->external_urls->spotify,$image,$a->genres);
            echo $artist->display();
        }
        ?>
    </div>
</div>
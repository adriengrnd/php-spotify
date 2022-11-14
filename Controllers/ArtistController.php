<?php
namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Album;
class ArtistController extends Controller
{
    public function index()
    {
        $name="orelsan";
        if(isset($_GET['name']))
        {
            $name = str_replace(' ',"_",$_GET['name']);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=$name&type=artist");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $artists = json_decode($result);
        $result = ['artists' => $artists];
        $this->render('artist/index', compact('result'));
    }
    public function view($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultArtist = curl_exec($ch);
        curl_close($ch);
        $artist = json_decode($resultArtist);
        $image = "https://upload.wikimedia.org/wikipedia/commons/c/ca/CD-ROM.png";
        if(!empty($artist->images)){
            $image=$artist->images[0]->url;
        }
        $art = new Artist($artist->id,$artist->name,$artist->followers->total,$artist->external_urls->spotify,$image,$artist->genres,null);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id/albums");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultAlbums = curl_exec($ch);
        curl_close($ch);
        $jsonAlbums = json_decode($resultAlbums);
        $albums=array();
        foreach ($jsonAlbums->items as $a){
            $albums[] = new Album($a->id, $a->name, $a->total_tracks, $a->external_urls->spotify, $a->images[0]->url, $a->release_date);
        }
        $result = ['artist' => $art, 'albums'=>$albums];
        $this->render('artist/view', compact('result'));
    }
    public function addFav($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultArtist = curl_exec($ch);
        curl_close($ch);
        $artist = json_decode($resultArtist);
        $image = "https://upload.wikimedia.org/wikipedia/commons/c/ca/CD-ROM.png";
        if(!empty($artist->images)){
            $image=$artist->images[0]->url;
        }
        $art = new Artist($artist->id,$artist->name,$artist->followers->total,$artist->external_urls->spotify,$image,$artist->genres,null);
        $compare = $art->findBy(['idArtist'=>$art->getIdArtist()]);
        if($compare==null) $art->create();

        header('Location: /favoris/artist');
    }
    public function deleteFav($id){
        $artisteQuery = new Artist('','',0,'','',null,null);
        $artisteQuery->delete($id);
        header('Location: /favoris/artist');
    }

}
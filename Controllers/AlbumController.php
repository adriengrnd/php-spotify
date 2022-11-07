<?php
namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Album;
use App\Entity\Track;

class AlbumController extends Controller
{

    public function view($id){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultQuery = curl_exec($ch);
        curl_close($ch);
        $jsonAlbum = json_decode($resultQuery);
        $album = new Album($jsonAlbum->id,$jsonAlbum->name, $jsonAlbum->total_tracks, $jsonAlbum->external_urls->spotify, $jsonAlbum->images[0]->url, $jsonAlbum->release_date);
        echo $album->display();
        $tracks = array();
        foreach ($jsonAlbum->tracks->items as $track){
            $artistNames="";
            foreach ($track->artists as $id=>$artist){
                if($id+1==count($track->artists)){
                    $artistNames.=$artist->name.".";
                }else{
                    $artistNames.=$artist->name.", ";
                }
            }
            $tracks[] = new Track($track->id, $track->name, $track->track_number, $track->external_urls->spotify, $track->duration_ms,$artistNames);
        }
        var_dump($tracks);
        $result = "";
        $this->render('album/view', compact('result'));
    }

}
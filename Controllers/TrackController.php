<?php
namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Album;
use App\Entity\Track;

class TrackController extends Controller
{

    public function addFav($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/tracks/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultQuery = curl_exec($ch);
        curl_close($ch);
        $track = json_decode($resultQuery);
        $artistNames="";
        foreach ($track->artists as $id=>$artist){
            if($id+1==count($track->artists)){
                $artistNames.=$artist->name.".";
            }else{
                $artistNames.=$artist->name.", ";
            }
        }
        $trackFav= new Track($track->id, $track->name, $track->track_number, $track->external_urls->spotify, $track->duration_ms,$artistNames,null);
        $trackFav->create();
        header('Location: /favoris/track');

    }
    public function deleteFav($id){
        $trackQuery = new Track('','',0,'',0,'',null);
        $trackQuery->delete($id);
        header('Location: /favoris/track');
    }

}
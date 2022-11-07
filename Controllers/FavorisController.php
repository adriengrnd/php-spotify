<?php
namespace App\Controllers;


use App\Entity\Artist;
use App\Entity\Track;

class FavorisController extends Controller
{
    public function artist()
    {
        $artisteQuery = new Artist('','',0,'','',null,null);
        $artistesFavoris = $artisteQuery->findAll();
        $artistes = array();
        foreach ($artistesFavoris as $artiste){
            $artistes[]=new Artist($artiste->idArtist,$artiste->name,$artiste->followers,$artiste->link,$artiste->picture,json_decode($artiste->genders), $artiste->id);
        }

        $this->render('favoris/artist', compact('artistes'));
    }
    public function track(){

        $trackQuery = new Track('','',0,'','','',null);
        $tracksFavoris = $trackQuery->findAll();
        $tracks = array();
        foreach ($tracksFavoris as $track){
            $tracks[]=new Track($track->idTrack, $track->name, $track->number, $track->link, $track->time,$track->artist,$track->id);
        }
        $this->render('favoris/track', compact('tracks'));
    }
}
<?php

namespace App\Entity;

class Album
{
    public function __construct(
        public string|null $idAlbum,

        public string|null $name,

        public int|null    $tracks,

        public string|null $link,

        public string|null $picture,

        public string|null $date,
    )
    {
    }

    /**
     * @return string|null
     */
    public function getIdAlbum(): ?string
    {
        return $this->idAlbum;
    }

    /**
     * @param string|null $idAlbum
     */
    public function setIdAlbum(?string $idAlbum): void
    {
        $this->idAlbum = $idAlbum;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getTracks(): ?int
    {
        return $this->tracks;
    }

    /**
     * @param int|null $tracks
     */
    public function setTracks(?int $tracks): void
    {
        $this->tracks = $tracks;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     */
    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @param string|null $picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function display(): string
    {
        return '<div class="col-md-4">
                   <div class="card m-2">
                    <img class="card-img-top" src="'.$this->getPicture().'" alt="'.$this->getName().'" width="380" height="380">
                    <div class="card-body">
                      <h5 class="card-title">'.$this->getName().' <small class="text-muted">('.$this->getTracks().')</small></h5>
                      <p class="card-text"><a href="'.$this->getLink().'" class="btn btn-sm btn-success">->spotify</a> <a href="/album/view/'.$this->getIdAlbum().'" class="btn btn-sm btn-primary">+</a></p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">'.$this->getDate().'</small>
                    </div>
                 </div>
                 </div>';
    }
    public function displayLarge(): string
    {
        return'<div class="card m-2 " style="width: 50%">
                    <img class="card-img-top" src="'.$this->getPicture().'" alt="'.$this->getName().'"  >
                    <div class="card-body">
                      <h5 class="card-title">'.$this->getName().' <small class="text-muted">('.$this->getTracks().')</small></h5>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">'.$this->getDate().'</small>
                    </div>
                 </div>';
    }

}

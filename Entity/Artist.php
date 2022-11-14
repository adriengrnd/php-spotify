<?php

namespace App\Entity;

class Artist extends Model
{

    public function __construct(
        public string|null $idArtist,

        public string|null $name,

        public int|null $followers,

        public string|null $link,

        public string|null $picture,

        public array|null  $genders,

        public int|null $id,
    )
    {
    }
    protected ?string $table = 'artist';
    public function getIdArtist(): string
    {
        return $this->idArtist;
    }

    public function setIdArtist(string $idArtist): self
    {
        $this->idArtist = $idArtist;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setFollowers(?int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): int
    {
        return $this->followers;
    }

    public function getGenders(): array
    {
        return $this->genders;
    }

    public function setGenders(?array $genders): self
    {
        $this->genders = $genders;
        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): string|null
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }
    public function display(): string
    {
        return '<div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                                 alt="' . $this->getName() . '">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $this->getName() . '</h5>
                                <p class="card-text"></p>
                                <p class="card-text"><small
                                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                                </p>
                                <a href="/artist/addFav/' . $this->getIdArtist() . '" class="btn btn-warning btn-sm">favori</a>
                                <a href="/artist/view/' . $this->getIdArtist() . '" class="btn btn-primary btn-sm">+</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
    public function displayGenders():string{
        $genders="";
        foreach ($this->getGenders() as $id=>$gender){
            if($id+1 == count($this->getGenders())){
                $genders.=$gender.".";
            }else{
                $genders.=$gender.", ";
            }
        }
        return $genders;
    }
    public function displayLarge(): string
    {
        return '<div class="card mb-3">
                    <img class="card-img-top" src="' . $this->getPicture() . '" alt="' . $this->getName() . '" width="500" height="500">
                    <div class="card-body">
                        <h2 class="card-title">' . $this->getName() . '</h2>
                        <p class="card-text">'.$this->displayGenders().'</p>
                        <p class="card-text"><small class="text-muted">' . number_format($this->getFollowers()) . ' followers</small></p>
                    </div>
                </div>';
    }
    public function displayFav():string
    {
        return '<div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                                 alt="' . $this->getName() . '">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">' . $this->getName() . '</h5>
                                <p class="card-text"></p>
                                <p class="card-text"><small
                                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                                </p>
                                <a href="/artist/deleteFav/' . $this->getId() . '" class="btn btn-danger btn-sm">Supp</a>
                                <a href="/artist/view/' . $this->getIdArtist() . '" class="btn btn-primary btn-sm">+</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }


}
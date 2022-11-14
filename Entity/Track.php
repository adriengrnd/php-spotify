<?php

namespace App\Entity;

use App\Core\Db;

class Track extends Model
{
    public function __construct(
        public string|null $idTrack,

        public string|null $name,

        public int|null $number,

        public string|null $link,

        public string|null $time,

        public string|null $artist,

        public int|null $id,
    )
    {
    }
    protected ?string $table = 'track';
    /**
     * @return string|null
     */
    public function getIdTrack(): ?string
    {
        return $this->idTrack;
    }

    /**
     * @param string|null $idTrack
     */
    public function setIdTrack(?string $idTrack): void
    {
        $this->idTrack = $idTrack;
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
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     */
    public function setNumber(?int $number): void
    {
        $this->number = $number;
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
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }


    /**
     * @return string|null
     */
    public function getArtist(): ?string
    {
        return $this->artist;
    }

    /**
     * @param string|null $artist
     */
    public function setArtist(?string $artist): void
    {
        $this->artist = $artist;
    }

    public function display(): string{
        return '<li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://www.samplelogic.com/wp-content/uploads/2021/03/cinematic-play-btn.png" alt="" style="width: 45px; height: 45px"
                             class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">'.$this->getNumber().'. '.$this->getName().'</p>
                            <p class="text-muted mb-0">'.$this->getArtist().'</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-link btn-rounded btn-sm" href="#" role="button">'.$this->getFormatTime().'</a>
                        <a href="/track/addFav/'.$this->getIdTrack().'" class="btn btn-sm btn-warning">Fav</a>
                    </div>
                </li>';
    }
    public function displayFav(): string{
        return '<li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="https://www.samplelogic.com/wp-content/uploads/2021/03/cinematic-play-btn.png" alt="" style="width: 45px; height: 45px"
                             class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">'.$this->getNumber().'. '.$this->getName().'</p>
                            <p class="text-muted mb-0">'.$this->getArtist().'</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-link btn-rounded btn-sm" href="#" role="button">'.$this->getFormatTime().'</a>
                        <a href="/track/deleteFav/'.$this->getId().'" class="btn btn-sm btn-danger">Supp</a>
                    </div>
                </li>';
    }
    public function getFormatTime(): string{
        $input = $this->getTime();

        $uSec = $input % 1000;
        $input = floor($input / 1000);

        $seconds = $input % 60;
        $input = floor($input / 60);

        $minutes = $input % 60;
        $input = floor($input / 60);
        return $minutes.':'.$seconds;
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
}
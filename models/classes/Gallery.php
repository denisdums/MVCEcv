<?php

namespace models\classes;


use models\ActorModel;
use models\FilmModel;
use models\ImageModel;
use stdClass;

class Gallery
{
    public array $images;
    public int $filmID;

    public function __construct(int $filmID, array $imageIDs)
    {
        $this->setFilmID($filmID);
        $this->setImages($imageIDs);
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages(array $images): void
    {
        $images = array_map(function ($image) {
            $imageModel = new ImageModel();
            return $imageModel->getById($image);
        }, $images) ?? [];
        $this->images = $images;
    }

    /**
     * @return int
     */
    public function getFilmID(): int
    {
        return $this->filmID;
    }

    /**
     * @param int $filmID
     */
    public function setFilmID(int $filmID): void
    {
        $this->filmID = $filmID;
    }
}
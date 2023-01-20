<?php

namespace models\classes;


use DateTime;
use models\ImageModel;
use stdClass;

class Film
{
    public int $id;
    public string $title;
    public string $synopsis;
    public string $date;
    public ?Image $image;
    public ?Image $banner;
    public string $trailer;
    public string $summary;
    public Gallery $gallery;

    public array $characters;

    public function __construct(stdClass $rawFilm)
    {
        $this->setId($rawFilm->id);
        $this->setTitle($rawFilm->title);
        $this->setSynopsis($rawFilm->synopsis);
        $this->setDate($rawFilm->date);
        $this->setImage($rawFilm->image);
        $this->setBanner($rawFilm->banner);
        $this->setTrailer($rawFilm->trailer);
        $this->setSummary($rawFilm->summary);
        $this->setCharacters($rawFilm->characters);
        $this->setGallery($rawFilm->gallery);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        $date = new DateTime($this->date);
        return $date->format("d/m/Y");
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return Image|null
     */
    public function getBanner(): ?Image
    {
        return $this->banner;
    }

    /**
     * @param int $banner
     */
    public function setBanner(int $banner): void
    {
        $imageModel = new ImageModel();
        $banner = $imageModel->getById($banner);
        $this->banner = $banner ?: null;
    }

    /**
     * @return string
     */
    public function getTrailer(): string
    {
        return $this->trailer;
    }

    /**
     * @param string $trailer
     */
    public function setTrailer(string $trailer): void
    {
        $this->trailer = $trailer;
    }

    /**
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return ?Gallery
     */
    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    /**
     * @param array $gallery
     */
    public function setGallery(array $gallery): void
    {
        $this->gallery = new Gallery($this->id, $gallery);
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param int $image
     */
    public function setImage(int $image): void
    {
        $imageModel = new ImageModel();
        $image = $imageModel->getById($image);
        $this->image = $image ?: null;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param array $characters
     */
    public function setCharacters(array $characters): void
    {
        $this->characters = array_map(function ($character) {
            return new Character($character);
        }, $characters);
    }
}
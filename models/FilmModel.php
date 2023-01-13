<?php

namespace models;

use models\base\SQL;
use models\classes\Film;

class FilmModel extends SQL
{
    public function __construct()
    {
        parent::__construct('films');
    }

    public function getAll(): ?array
    {
        $data = parent::getAll();
        return $data ? array_map(function ($film) {
            $characterModel = new CharacterModel();
            $film->characters = $characterModel->getAllByFilmID($film->id);

            $galleryModel = new GalleryModel();
            $film->gallery = $galleryModel->getAllByFilmID($film->id);

            return new Film($film);
        }, $data) : null;
    }

    public function getById(int $id): ?Film
    {
        $film = parent::getOne($id);

        $characterModel = new CharacterModel();
        $film->characters = $characterModel->getAllByFilmID($film->id);

        $galleryModel = new GalleryModel();
        $film->gallery = $galleryModel->getAllByFilmID($film->id);

        return $film ? new Film($film) : null;
    }

    public function getByTitle(string $title): ?Film
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM $this->tableName WHERE title = ?");
        $stmt->execute([$title]);
        $film = $stmt->fetch(\PDO::FETCH_OBJ);

        $characterModel = new CharacterModel();
        $film->characters = $characterModel->getAllByFilmID($film->id);

        $galleryModel = new GalleryModel();
        $film->gallery = $galleryModel->getAllByFilmID($film->id);

        return $film ? new Film($film) : null;
    }

    public function create(string $title, string $synopsis, string $summary, string $date, string $trailer, string
    $image, string $banner, array $actors, array $characters, array $gallery): bool
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (title, synopsis, summary, date, trailer, image, banner) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $synopsis, $summary, $date, $trailer, $image, $banner]);

        $filmCreated = $this->getById($this->getPdo()->lastInsertId());

        $characterModel = new CharacterModel();
        $characterUpdated = $characterModel->updateFilmList($actors, $characters, $filmCreated);

        $galleryModel = new GalleryModel();
        $galleryUpdated = $galleryModel->updateFilmGallery($gallery, $filmCreated);

        return $filmCreated && $characterUpdated && $galleryUpdated;
    }

    public function update(string $id, string $title, string $synopsis, string $summary, string $date, string
    $trailer, string $image, string $banner, array $actors, array $characters, array $gallery): bool
    {
        $data = [
            'title' => $title,
            'synopsis' => $synopsis,
            'date' => $date,
            'trailer' => $trailer,
            'summary' => $summary,
            'image' => $image,
            'banner' => $banner
        ];

        $characterModel = new CharacterModel();
        $characterUpdated = $characterModel->updateFilmList($actors, $characters, $this->getById($id));

        $galleryModel = new GalleryModel();
        $galleryUpdated = $galleryModel->updateFilmGallery($gallery, $this->getById($id));

        return parent::updateOne($id, $data) && $characterUpdated && $galleryUpdated;
    }
}
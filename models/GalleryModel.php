<?php

namespace models;

use models\base\SQL;
use models\classes\Actor;
use models\classes\Film;
use models\classes\Gallery;
use models\classes\Image;
use PDO;

class GalleryModel extends SQL
{
    public function __construct()
    {
        parent::__construct('image_film');
    }

    public function updateFilmGallery(array $images, Film $film): bool
    {
        // Delete all the actors from the film
        $stmt = $this->getPdo()->prepare("DELETE FROM $this->tableName WHERE filmID = ?");
        $stmt->execute([$film->getId()]);

        // Insert the new images
        $success = true;
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (imageID, filmID) VALUES (?, ?)");
        foreach ($images as $image) {
            $success = $stmt->execute([$image, $film->getId()]);
        }
        return $success;
    }

    public function getAllByFilmID(int $filmID): ?array
    {
        $stmt = SQL::getPdo()->prepare("SELECT imageID FROM {$this->tableName} WHERE filmID = ?;");
        $stmt->execute([$filmID]);
        $images = $stmt->fetchAll(PDO::FETCH_OBJ);

        return array_map(function ($image) {
            return $image->imageID;
        }, $images);
    }

}
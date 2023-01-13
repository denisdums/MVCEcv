<?php

namespace models;

use models\base\SQL;
use models\classes\Actor;
use models\classes\Film;
use PDO;

class CharacterModel extends SQL
{
    public function __construct()
    {
        parent::__construct('actor_film');
    }

    public function updateFilmList(array $actors, array $characters, Film $film): bool
    {
        // Delete all the actors from the film
        $stmt = $this->getPdo()->prepare("DELETE FROM $this->tableName WHERE filmID = ?");
        $stmt->execute([$film->getId()]);

        // Insert the new actors
        $success = true;
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (actorID, filmID, name) VALUES (?, ?, ?)");
        foreach ($actors as $key => $actor) {
            $success = $stmt->execute([$actor, $film->getId(), $characters[$key]]);
        }
        return $success;
    }

    public function getAllByFilmID(int $filmID): ?array
    {
        $stmt = SQL::getPdo()->prepare("SELECT * FROM {$this->tableName} WHERE filmID = ?;");
        $stmt->execute([$filmID]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
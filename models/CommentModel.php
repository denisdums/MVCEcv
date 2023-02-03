<?php

namespace models;

use models\base\SQL;
use models\classes\Comment;
use models\classes\Image;
use PDO;
use utils\JsonHelpers;

class CommentModel extends SQL
{
    public function __construct()
    {
        parent::__construct('comments');
    }

    public function getAll(): ?array
    {
        $data = parent::getAll();
        return $data ? array_map(function ($comment) {
            return new Comment($comment);
        }, $data) : null;
    }

    public function getAllByFilmID(int $filmID): ?array
    {

        $stmt = SQL::getPdo()->prepare("SELECT * FROM {$this->tableName} WHERE filmID = ?;");
        $stmt->execute([$filmID]);
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $data ? array_map(function ($comment) {
            return new Comment($comment);
        }, $data) : null;
    }

    public function getById(int $id): ?Comment
    {
        $data = parent::getOne($id);
        return $data ? new Comment($data) : null;
    }

    public function create(string $filmID, string $message): bool
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (filmID, message, date) VALUES (?, ?, ?)");
        return $stmt->execute([$filmID, $message, date('Y-m-d H:i:s')]);
    }
}
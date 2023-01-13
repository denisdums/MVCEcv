<?php

namespace models;

use models\base\SQL;
use models\classes\Actor;

class ActorModel extends SQL
{
    public function __construct()
    {
        parent::__construct('actors');
    }

    public function getAll(): ?array
    {
        $data = parent::getAll();
        return $data ? array_map(function ($actor) {
            return new Actor($actor);
        }, $data) : null;
    }

    public function getById(int $id): ?Actor
    {
        $data = parent::getOne($id);
        return $data ? new Actor($data) : null;
    }

    public function create(string $name, string $image = ''): bool
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO $this->tableName (name, image) VALUES (?, ?)");
        return $stmt->execute([$name, $image]);
    }

    public function update(string $id, string $name, string $image = ''): bool
    {
        $data = [
            'name' => $name,
            'image' => $image,
        ];

        return parent::updateOne($id, $data);
    }
}
<?php

namespace models;

use models\base\SQL;
use models\classes\User;

class UserModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function getAll(): ?array
    {
        $data = parent::getAll();
        return $data ? array_map(function ($user) {
            return new User($user);
        }, $data) : null;
    }

    public function getByEmail(string $email): ?User
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(\PDO::FETCH_OBJ);
        return $data ? new User($data) : null;
    }
}
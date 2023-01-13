<?php

namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users');
    }


    public function createUser(string $email, string $password, string $name)
    {
        $password = $this->hashPassword($password);
        try {
            $stmt = $this->getPdo()->prepare("INSERT INTO `users` (email, password, name) VALUES (?, ?, ?)");
            $stmt->execute([$email, $password, $name]);
        } catch (\PDOException $error) {
            return false;
        }
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function loginUser($email, $password): bool
    {
        $userModel = new UserModel();
        $user = $userModel->getByEmail($email);
        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['USER'] = $user;
            return true;
        }
        return false;
    }
}
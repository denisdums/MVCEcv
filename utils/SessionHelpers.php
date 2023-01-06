<?php


namespace utils;


use models\classes\User;

class SessionHelpers
{
    public function __construct()
    {
        SessionHelpers::init();
    }

    static function init(): void
    {
        session_start();
    }

    static function login(mixed $equipe): void
    {
        $_SESSION['USER'] = $equipe;
    }

    static function logout(): void
    {
        unset($_SESSION['USER']);
    }

    static function getConnected(): mixed
    {
        if (SessionHelpers::isLogin()) {
            return $_SESSION['USER'];
        } else {
            return array();
        }
    }

    static function isLogin(): bool
    {
        return isset($_SESSION['USER']);
    }

    static function getConnectedUser(): ?User
    {
        return SessionHelpers::isLogin() ? $_SESSION['USER'] : null;
    }
}
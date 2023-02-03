<?php

namespace middlewares;

use controllers\base\WebController;

class TokenMiddleware extends WebController
{
    public function goodToken(): bool
    {
        return isset($_GET['token']) && '1234' === $_GET['token'];
    }

    public function badToken(): bool
    {
        return !isset($_GET['token']) || '1234' ==! $_GET['token'];
    }
}
<?php

namespace middlewares;

use controllers\base\WebController;
use utils\SessionHelpers;

class AuthMiddleware extends WebController
{
    public function isLogin(): bool
    {
        return SessionHelpers::isLogin();
    }

    public function isNotLogin(): bool
    {
        return !SessionHelpers::isLogin();
    }
}
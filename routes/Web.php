<?php

namespace routes;

use controllers\BackWebController;
use controllers\SampleWebController;
use controllers\UserWebController;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        Route::Add('/', [(new SampleWebController()), 'home']);

        /**
         * Connected Middleware
         */
        if (SessionHelpers::isLogin()){
            Route::Add('/back', [(new BackWebController()), 'index']);
            Route::Add('/logout', [(new UserWebController()), 'logout']);
        }else {
            Route::Add('/sign-in', [(new UserWebController()), 'signIn']);
            Route::Add('/register-user', [(new UserWebController()), 'register']);
            Route::Add('/login', [(new UserWebController()), 'login']);
            Route::Add('/login-user', [(new UserWebController()), 'loginUser']);
        }
    }
}


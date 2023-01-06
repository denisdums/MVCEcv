<?php

namespace routes;

use controllers\SampleWebController;
use controllers\UserWebController;
use routes\base\Route;

class Web
{
    function __construct()
    {
        Route::Add('/', [(new SampleWebController()), 'home']);
        Route::Add('/users', [(new UserWebController()), 'render']);
        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}


<?php

namespace routes;

use controllers\BackActorWebController;
use controllers\BackFilmWebController;
use controllers\BackImageWebController;
use controllers\BackWebController;
use controllers\CommentController;
use controllers\PagesWebController;
use controllers\UserWebController;
use middlewares\AuthMiddleware;
use middlewares\TokenMiddleware;
use routes\base\Middleware;
use routes\base\Route;

class Web
{
    function __construct()
    {
        $userController = new UserWebController();
        $authMiddleware = new AuthMiddleware();

        /**
         * Default Routes
         */
        Route::Add('/', [(new PagesWebController()), 'home']);
        Route::Add('/films', [(new PagesWebController()), 'films']);
        Route::Add('/film/', [(new PagesWebController()), 'film']);
        Route::Add('/galerie/', [(new PagesWebController()), 'galerie']);
        Route::Add('/acteurs/', [(new PagesWebController()), 'acteurs']);
        Route::Add('/ui', [(new PagesWebController()), 'ui']);
        Route::Add('/ajax/front/comment/add', [(new CommentController()), 'add']);

        Middleware::Add([$authMiddleware, 'isLogin'], function() use ($userController) {
            $backController = new BackWebController();
            Route::Add('/back', [$backController, 'index']);
            Route::Add('/logout', [$userController, 'logout']);

            // Film Crud
            $filmController = new BackFilmWebController();
            Route::Add('/back/film/edit', [$filmController, 'edit']);
            Route::Add('/back/film/all', [$filmController, 'all']);
            Route::Add('/back/film/save', [$filmController, 'save']);
            Route::Add('/back/film/delete', [$filmController, 'delete']);

            // Actor Crud
            $actorController = new BackActorWebController();
            Route::Add('/back/actor/edit', [$actorController, 'edit']);
            Route::Add('/back/actor/all', [$actorController, 'all']);
            Route::Add('/back/actor/save', [$actorController, 'save']);
            Route::Add('/back/actor/delete', [$actorController, 'delete']);

            // Image Crud
            $imageController = new BackImageWebController();
            Route::Add('/back/image/edit', [$imageController, 'edit']);
            Route::Add('/back/image/all', [$imageController, 'all']);
            Route::Add('/back/image/save', [$imageController, 'save']);
            Route::Add('/back/image/delete', [$imageController, 'delete']);
            Route::Add('/ajax/back/image/add', [$imageController, 'saveAjax']);
        });

        Middleware::Add([$authMiddleware, 'isNotLogin'], function() use ($userController) {
            $tokenMiddleware = new TokenMiddleware();
            Route::Add('/register-user', [$userController, 'register']);
            Route::Add('/login', [$userController, 'login']);
            Route::Add('/login-user', [$userController, 'loginUser']);
            Middleware::Add([$tokenMiddleware, 'goodToken'], function() use ($userController) {
                Route::Add('/sign-in', [$userController, 'signIn']);
            });
        });
    }
}


<?php

namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use models\UserModel;
use utils\SessionHelpers;
use utils\Template;

class BackWebController extends WebController
{
    public function index(){
        $user = SessionHelpers::getConnectedUser();
        return Template::render("views/back/index.php", ['user' => $user]);
    }
}
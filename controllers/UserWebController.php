<?php

namespace controllers;

use controllers\base\WebController;
use models\UserModel;
use utils\Template;

class UserWebController extends WebController
{
    public function render()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();
        var_dump($users);
    }
}
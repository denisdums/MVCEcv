<?php

namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use models\UserModel;
use utils\Template;

class UserWebController extends WebController
{
    public function signIn(): string
    {
        return Template::render("views/user/sign-in.php");
    }

    public function login(): string
    {
        return Template::render("views/user/login.php");
    }

    public function register()
    {
        $userModel = new UserModel();
        $userExist = $userModel->getByEmail($_POST['email'] ?: '');

        if ($userExist || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['name'])) {
            $this->redirect('/sign-in');
        }

        $authModel = new AuthModel();
        $this->redirect($authModel->createUser($_POST['email'], $_POST['password'], $_POST['name']) ? '/login' : '/sign-in');
    }

    public function loginUser()
    {
        $userModel = new UserModel();
        $userExist = $userModel->getByEmail($_POST['email'] ?: '');

        if (!$userExist || !isset($_POST['email']) || !isset($_POST['password'])) {
            $this->redirect('/login');
        }

        $authModel = new AuthModel();
        $this->redirect($authModel->loginUser($_POST['email'], $_POST['password']) ? '/back' : '/login');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/');
    }
}
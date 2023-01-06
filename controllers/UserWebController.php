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

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $authModel = new AuthModel();

        $this->redirect($authModel->createUser($email, $password, $name) ? '/login' : '/sign-in');
    }

    public function loginUser()
    {
        $userModel = new UserModel();
        $userExist = $userModel->getByEmail($_POST['email'] ?: '');

        if (!$userExist || !isset($_POST['email']) || !isset($_POST['password'])) {
            $this->redirect('/login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $authModel = new AuthModel();
        $this->redirect($authModel->loginUser($email, $password)? '/back' : '/login');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/');
    }
}
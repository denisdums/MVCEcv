<?php

namespace controllers;

use controllers\base\WebController;
use models\ActorModel;
use utils\Template;

class BackActorWebController extends WebController
{
    public function edit(): ?string
    {
        $actorModel = new ActorModel();
        $actor = isset($_GET['id']) ? $actorModel->getById($_GET['id']) : null;

        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/actor/edit.php", ['actor' => $actor]);
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function all(): string
    {
        $actorModel = new ActorModel();
        $actors = $actorModel->getAll();

        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/actor/all.php", ['actors' => $actors]);
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function save()
    {
        if (!isset($_POST['name']) || !isset($_POST['image'])) {
            $this->redirect('/back/actor/edit');
        }

        $actorModel = new ActorModel();

        if (isset($_POST['id'])) {
            $actorModel->update($_POST['id'], $_POST['name'], $_POST['image']);
        } else {
            $actorModel->create($_POST['name'], $_POST['image']);
        }

        $this->redirect('/back/actor/all');
    }

    public function delete()
    {
        if (!$_GET['id']) {
            $this->redirect('/back/actor/all');
        }

        $actorModel = new ActorModel();
        $actorModel->deleteOne($_GET['id']);
        $this->redirect('/back/actor/all');
    }
}
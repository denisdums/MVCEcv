<?php

namespace controllers;

use controllers\base\WebController;
use models\ImageModel;
use utils\JsonHelpers;
use utils\Template;

class BackImageWebController extends WebController
{
    public function edit(): ?string
    {
        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/image/edit.php");
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function all(): string
    {
        $imageModel = new ImageModel();
        $images = $imageModel->getAll();

        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/image/all.php", ['images' => $images]);
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function save()
    {
        if (!isset($_FILES['image']) || !isset($_POST['alt'])) {
            $this->redirect('/back/image/edit');
        }
        $imageModel = new ImageModel();
        $imageModel->create($_FILES['image'], $_POST['alt']);
        $this->redirect('/back/image/all');
    }

    public function delete()
    {
        if (!$_GET['id']) {
            $this->redirect('/back/image/all');
        }

        $imageModel = new ImageModel();
        $imageModel->delete($_GET['id']);
        $this->redirect('/back/image/all');
    }

    public function saveAjax(): void
    {
        $imageModel = new ImageModel();
        $success = $imageModel->create($_FILES['add-image'], '');

        if (!$success) {
            echo JsonHelpers::stringify(['success' => 'false']);
            exit;
        }

        $imageID = $imageModel->getPDO()->lastInsertId();
        $image = $imageModel->getById($imageID);
        $content = Template::render("views/back/fields/image-picker-item.php", ['image' => $image], false);

        echo JsonHelpers::stringify(['success' => 'true', 'content' => $content]);
        exit;
    }
}
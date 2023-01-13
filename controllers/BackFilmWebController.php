<?php

namespace controllers;

use controllers\base\WebController;
use models\FilmModel;
use utils\Template;

class BackFilmWebController extends WebController
{
    public function edit(): ?string
    {
        $filmModel = new FilmModel();
        $film = isset($_GET['id']) ? $filmModel->getById($_GET['id']) : null;

        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/film/edit.php", ['film' => $film]);
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function all(): string
    {
        $filmModel = new FilmModel();
        $films = $filmModel->getAll();

        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/film/all.php", ['films' => $films]);
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }

    public function save()
    {
        if (!isset($_POST['title'])) {
            $this->redirect('/back/film/edit');
        }

        $filmModel = new FilmModel();
        $actors = array_filter($_POST['actors']) ?? [];
        $characters = array_filter($_POST['characters']) ?? [];
        $gallery = array_filter($_POST['gallery']) ?? [];
        if (isset($_POST['id'])) {
            $filmModel->update(
                $_POST['id'],
                $_POST['title'],
                $_POST['synopsis'] ?? '',
                $_POST['summary'] ?? '',
                $_POST['date'] ?? null,
                $_POST['trailer'] ?? null,
                $_POST['image'] ?? null,
                $_POST['banner'] ?? null,
                $actors,
                $characters,
                $gallery,
            );
        } else {
            $filmModel->create(
                $_POST['title'],
                $_POST['synopsis'] ?? '',
                $_POST['summary'] ?? '',
                $_POST['date'] ?? null,
                $_POST['trailer'] ?? null,
                $_POST['image'] ?? null,
                $_POST['banner'] ?? null,
                $actors,
                $characters,
                $gallery
            );
        }

        $this->redirect('/back/film/all');
    }

    public function delete()
    {
        if (!$_GET['id']) {
            $this->redirect('/back/film/all');
        }

        $filmModel = new FilmModel();
        $filmModel->deleteOne($_GET['id']);
        $this->redirect('/back/film/all');
    }
}
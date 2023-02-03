<?php

namespace controllers;

use controllers\base\WebController;
use models\FilmModel;
use utils\Template;

class PagesWebController extends WebController
{
    function home(): string
    {
        return Template::render("views/global/home.php");
    }

    function ui(): string
    {
        return Template::render("views/global/ui.php");
    }

    function films(): string
    {
        $filmsModel = new FilmModel();
        $films = $filmsModel->getAll();
        return Template::render("views/global/films.php", ["films" => $films]);
    }

    function film(): string
    {
        if (!isset($_GET["id"])) {
            $this->redirect("/films");
        }

        $filmsModel = new FilmModel();
        $film = $filmsModel->getById($_GET["id"]);
        return Template::render("views/global/film.php", ["film" => $film]);
    }

    function galerie(): string
    {
        return Template::render("views/global/gallery.php", ['gallery' => (new \models\GalleryModel())->getGlobalGallery
        ()]);
    }

    function acteurs(): string
    {
        return Template::render("views/global/actors.php", ['actors' => (new \models\ActorModel())->getAll()]);
    }
}
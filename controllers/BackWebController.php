<?php

namespace controllers;

use controllers\base\WebController;
use utils\Template;

class BackWebController extends WebController
{
    public function index(): ?string
    {
        $content = Template::render("views/back/before-container.php");
        $content .= Template::render("views/back/index.php");
        $content .= Template::render("views/back/after-container.php");
        return $content;
    }
}
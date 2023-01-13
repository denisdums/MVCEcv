<?php

namespace utils\Fields;

use models\ActorModel;
use models\classes\Image;
use models\ImageModel;
use utils\Template;

class ActorRepeater
{
    static function render(array $defaultValue = []): string
    {
        $actorModel = new ActorModel();
        $actors = $actorModel->getAll();

        return Template::render("views/back/fields/actor-repeater.php", [
            'actors' => $actors,
            'defaultValue' => $defaultValue
        ]);
    }
}
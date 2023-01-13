<?php

namespace utils\Fields;

use models\classes\Image;
use models\ImageModel;
use utils\Template;

class Input
{
    static function render(
        string $inputName,
        string $defaultValue = null,
        string $type = 'text',
        string $label = 'Champ de  base'
    ): string
    {
        return Template::render("views/back/fields/input.php", [
            'inputName' => $inputName,
            'defaultValue' => $defaultValue,
            'label' => $label,
            'type' => $type
        ]);
    }
}
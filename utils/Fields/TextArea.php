<?php

namespace utils\Fields;

use models\classes\Image;
use models\ImageModel;
use utils\Template;

class TextArea
{
    static function render(
        string $inputName,
        string $defaultValue = null,
        string $label = 'Champ de  base',
        int $size = 5
    ): string
    {
        return Template::render("views/back/fields/textarea.php", [
            'inputName' => $inputName,
            'defaultValue' => $defaultValue,
            'label' => $label,
            'size' => $size
        ]);
    }
}
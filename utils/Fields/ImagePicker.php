<?php

namespace utils\Fields;

use models\classes\Image;
use models\ImageModel;
use utils\Template;

class ImagePicker
{
    static function render(
        string $inputName,
        array|Image  $defaultValue = null,
        string $label = 'Image',
        bool   $multiple = false
    ): string
    {
        $imagesModel = new ImageModel();
        $images = $imagesModel->getAll();

        return Template::render("views/back/fields/image-picker.php", [
            'inputName' => $inputName,
            'images' => $images,
            'defaultValue' => $defaultValue ?? [],
            'label' => $label,
            'multiple' => $multiple
        ]);
    }
}
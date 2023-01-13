<?php

use models\classes\Image;
use utils\Template;

/**
 * @var $inputName string
 * @var $images array
 * @var $defaultValue Image|array|null
 * @var $label string
 * @var $multiple bool
 */
$value = is_array($defaultValue) ? $defaultValue : [$defaultValue];
?>

<div class="image-picker <?= $multiple ? 'image-picker-multiple' : '' ?>">
    <template class="image-picker-preview-item">
        <?= Template::render('views/back/fields/image-picker-preview.php', [
            'name' => $inputName,
            'multiple' => $multiple
        ]) ?>
    </template>
    <fieldset>
        <label for="<?= $inputName ?>"><?= $label ?></label>
        <div class="image-picker-preview-wrapper">
            <?php foreach ($value as $image): ?>
                <?= Template::render('views/back/fields/image-picker-preview.php', [
                    'image' => $image,
                    'name' => $inputName,
                    'multiple' => $multiple
                ]) ?>
            <?php endforeach; ?>
        </div>
        <button class="button-blue image-picker-toggle">Choisir <?= $multiple ? 'des images' : 'une image' ?></button>
        <div class="image-picker-popin" aria-expanded="false">
            <div class="image-picker-popin-container">
                <button class="image-picker-toggle image-picker-close">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 8.933-2.721-2.722c-.146-.146-.339-.219-.531-.219-.404 0-.75.324-.75.749 0 .193.073.384.219.531l2.722 2.722-2.728 2.728c-.147.147-.22.34-.22.531 0 .427.35.75.751.75.192 0 .384-.073.53-.219l2.728-2.728 2.729 2.728c.146.146.338.219.53.219.401 0 .75-.323.75-.75 0-.191-.073-.384-.22-.531l-2.727-2.728 2.717-2.717c.146-.147.219-.338.219-.531 0-.425-.346-.75-.75-.75-.192 0-.385.073-.531.22z"
                              fill-rule="nonzero"/>
                    </svg>
                </button>
                <ul class="backend-list-images">
                    <?php if ($images): foreach ($images as $image): ?>
                        <?= Template::render('views/back/fields/image-picker-item.php', [
                            'image' => $image
                        ]) ?>
                    <?php endforeach; endif; ?>
                </ul>

                <fieldset class="image-picker-add-form">
                    <label>Ajouter une image
                        <input type="file" name="add-image" id="add-image">
                    </label>
                    <div class="image-picker-add-preview">
                        <div class="backend-list-images-wrapper">
                            <img src="" alt="">
                        </div>
                        <input type="submit" value="Ajouter" class="button-blue">
                    </div>
                </fieldset>

                <button class="button-blue image-picker-validate">Valider</button>
            </div>
        </div>
    </fieldset>
</div>

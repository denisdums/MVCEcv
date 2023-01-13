<?php
/**
 * @var $film Film
 */

use utils\Fields\ActorRepeater;
use utils\Fields\ImagePicker;
use utils\Fields\Input;
use utils\Fields\TextArea;

?>

<h1>Ajouter un film</h1>
<form action="/back/film/save" method="post" class="backend-2cols-form">
    <div class="backend-form backend-2cols-form-wrapper">
        <?php if ($film): ?>
            <input type="hidden" name="id" value="<?= $film->id ?>">
        <?php endif; ?>
        <?= Input::render('title', $film->title ?? '', 'text', 'Titre') ?>
        <?= TextArea::render('synopsis', $film->synopsis ?? '', 'Synopsis') ?>
        <?= TextArea::render('summary', $film->summary ?? '', 'Résumé', 10) ?>
        <?= Input::render('date', $film->date ?? '', 'date', 'Date de sortie') ?>
        <?= Input::render('trailer', $film->trailer ?? '', 'url', 'URL de la bande annonce') ?>
        <?= ActorRepeater::render($film->characters ?? []) ?>
        <input type="submit" value="Enregistrer" class="button-blue">
    </div>
    <div>
        <div class="backend-form backend-2cols-form-wrapper">
            <?= ImagePicker::render('image', $film->image ?? null, 'Image mise en avant') ?>
        </div>
        <div class="backend-form backend-2cols-form-wrapper">
            <?= ImagePicker::render('banner', $film->banner ?? null, 'Bannière') ?>
        </div>
        <div class="backend-form backend-2cols-form-wrapper">
            <?= ImagePicker::render('gallery', isset($film->gallery) ? $film->gallery->images ?? null : null, 'Gallerie', true) ?>
        </div>
    </div>
</form>
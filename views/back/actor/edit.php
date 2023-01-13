<?php

use utils\Fields\ImagePicker;

/**
 * @var $actor Actor
 */
?>


<h1>Ajouter un acteur</h1>
<form action="/back/actor/save" method="post" class="backend-form">
    <?php if ($actor): ?>
        <input type="hidden" name="id" value="<?= $actor->id ?>">
    <?php endif; ?>
    <fieldset>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?= $actor->name ?? '' ?>">
    </fieldset>
    <?= ImagePicker::render('image', $actor->image ?? null) ?>
    <input type="submit" value="Enregistrer" class="button-blue">
</form>
<?php
/**
 * @var $actors array
 * @var $actor Actor
 * @var $defaultValue array
 */

use models\classes\Actor;
use utils\Template;

?>

<fieldset>
    <label>Acteurs</label>
    <div class="actor-repeater">
        <template class="actor-repeater-template">
            <?= Template::render('views/back/fields/actor-repeater-line.php', ['actors' => $actors]) ?>
        </template>

        <div class="actor-repeater-list">
            <?php foreach ($defaultValue as $value): ?>
                <?= Template::render('views/back/fields/actor-repeater-line.php', ['actors' => $actors, 'value' =>
                    $value]) ?>
            <?php endforeach; ?>
        </div>

        <button class="actor-repeater-add button-blue">Ajouter un acteur</button>
    </div>
</fieldset>
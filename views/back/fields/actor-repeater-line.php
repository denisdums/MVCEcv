<?php
/**
 * @var $value ?Character
 * @var $actors array
 * @var $actor Actor
 */

use models\classes\Actor;
use models\classes\Character;

?>

<div class="actor-repeater-line">
    <select name="actors[]" class="actor-repeater-select">
        <option value="">Choisissez un acteur</option>
        <?php foreach ($actors as $actor): ?>
            <?php if (isset($value) && $value->actor->getId() === $actor->getId()): ?>
                <option value="<?= $actor->getId() ?>" selected><?= $actor->getName() ?></option>
            <?php else: ?>
                <option value="<?= $actor->getId() ?>"><?= $actor->getName() ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    <?php if (isset($value)): ?>
        <input type="text" name="characters[]" value="<?= $value->getName() ?>" placeholder="Rôle">
    <?php else: ?>
        <input type="text" name="characters[]" placeholder="Rôle">
    <?php endif; ?>
    <button class="actor-repeater-delete button-blue">Supprimer</button>
</div>
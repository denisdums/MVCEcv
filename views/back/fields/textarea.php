<?php
/**
 * @var $inputName string
 * @var $defaultValue string
 * @var $label string
 * @var $size int
 */

?>

<fieldset>
    <label for="<?= $inputName ?>"><?= $label ?></label>
    <textarea name="<?= $inputName ?>" id="<?= $inputName ?>" cols="30" rows="<?= $size ?>"><?= $defaultValue ?></textarea>
</fieldset>
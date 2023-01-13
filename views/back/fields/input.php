<?php
/**
 * @var $inputName string
 * @var $defaultValue string
 * @var $type string
 * @var $label string
 */

?>

<fieldset>
    <label for="<?= $inputName ?>"><?= $label ?></label>
    <input type="<?= $type ?>" name="<?= $inputName ?>" id="<?= $inputName ?>" value="<?= $defaultValue ?>">
</fieldset>
<?php

use models\classes\Image;

/**
 * @var $image Image
 */
?>
<li class="backend-list-images-wrapper image-picker-item" aria-selected="false"
    data-image="<?= $image->id ?>">
    <img src="<?= $image->url ?>" alt="<?= $image->alt ?>">
</li>
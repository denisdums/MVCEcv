<?php
/**
 * @var $films Film
 */
?>
<h1>Tout les films</h1>
<ul class="backend-list">
    <?php if ($films): foreach ($films as $film): ?>
        <li class="backend-list-item">
            <div class="backend-list-item-title-wrapper">
                <span class="backend-list-item-title"><?= $film->title ?></span>
                <div class="backend-list-item-actions">
                    <a class="backend-list-item-delete" href="/back/film/delete?id=<?= $film->id ?>">Supprimer</a>
                    <a class="backend-list-item-modify" href="/back/film/edit?id=<?= $film->id ?>">Modifier</a>
                </div>
            </div>
        </li>
    <?php endforeach; endif; ?>
</ul>
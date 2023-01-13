<?php
/**
 * @var $actors array
 * @var $actor Actor
 */
?>
<h1>Tout les acteurs</h1>
<ul class="backend-list">
    <?php if ($actors): foreach ($actors as $actor): ?>
        <li class="backend-list-item">
            <div class="backend-list-item-title-wrapper">
                <span class="backend-list-item-title"><?= $actor->name ?></span>
                <div class="backend-list-item-actions">
                    <a class="backend-list-item-delete" href="/back/actor/delete?id=<?= $actor->id ?>">Supprimer</a>
                    <a class="backend-list-item-modify" href="/back/actor/edit?id=<?= $actor->id ?>">Modifier</a>
                </div>
            </div>
        </li>
    <?php endforeach; endif; ?>
</ul>
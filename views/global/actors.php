<?php
/***
 * @var models\classes\Actor[] $actors
 */
?>

<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div>
                <h1>Les Acteurs</h1>
                <p>Les acteurs principaux de la série "Le Monde de Narnia" ont interprété les rôles clés des enfants
                    Pevensie, de la Sorcière Blanche et de la voix de Aslan, apportant vie à l'univers magique de
                    Narnia.</p>
            </div>
            <div class="actors-grid">
                <?php foreach ($actors as $actor): ?>
                    <?php
                    $image = $actor->getImage();
                    ?>
                    <article class="actors-grid-item">
                        <?php if ($image): ?>
                            <img src="<?= $image->getUrl() ?>" alt="<?= $image->getAlt() ?>">
                        <?php endif; ?>
                        <h1><?= $actor->getName() ?></h1>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?= \utils\Template::render('views/common/footer.php') ?>
<?php

use models\classes\Image;

/***
 * @var Image[] $gallery
 */
?>

<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div>
                <h1>La galerie</h1>
                <p>Explorez les merveilles visuelles du monde magique de Narnia dans notre galerie d'images. Plongez
                    dans les paysages épiques, rencontrez les personnages emblématiques et découvrez les secrets cachés
                    de l'univers de Narnia.</p>
            </div>
            <div class="gallery-block">
                <h3>La galerie</h3>
                <div class="gallery-wrapper small-container">
                    <?php foreach ($gallery as $image): ?>
                        <div class="gallery-item">
                            <img src="<?= $image->getUrl() ?>" alt="<?= $image->getAlt() ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?= \utils\Template::render('views/common/footer.php') ?>
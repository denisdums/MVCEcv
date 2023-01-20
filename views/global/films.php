<?php
/**
 * @var array $films
 * @var Film $film
 */

use models\classes\Film;

?>

<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div>
                <h1>Les films Narnia</h1>
                <p>Dans l'ensemble, les films de la série "Narnia" explorent des thèmes tels que la loyauté, le courage,
                    la foi et l'amitié, et ils offrent des aventures épiques et des personnages mémorables pour tous les
                    âges.</p>
            </div>
            <div class="films-grid wardrobe-decoration">
                <?php foreach ($films as $film): ?>
                    <article class="films-grid-item">
                        <img src="<?= $film->image->getUrl() ?>" alt="<?= $film->image->getAlt() ?>">
                        <div class="films-grid-item-info">
                            <a href="/film/?id=<?= $film->getId() ?>"></a>
                            <h1><?= $film->getTitle() ?></h1>
                            <span>Sortie le <?= $film->getDate() ?></span>
                            <p><?= $film->getSynopsis() ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?= \utils\Template::render('views/common/footer.php') ?>
<?php
/**
 * @var Film $film
 * @var Character $character
 */

use models\classes\Character;
use models\classes\Film;
use utils\Youtube;

?>

<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div class="film-heading">
                <div>
                    <h1 class="big-title"><?= $film->getTitle() ?></h1>
                    <h2>Le film</h2>
                    <p><?= $film->getSynopsis() ?></p>
                </div>
                <img src="<?= $film->getImage()->getUrl() ?>" alt="<?= $film->getImage()->getAlt() ?>">
            </div>

            <div class="callout">
                <div class="small-container">
                    <h3>Résumé</h3>
                    <p><?= $film->getSummary() ?></p>
                </div>
            </div>

            <div class="banner">
                <img src="<?= $film->getBanner()->getUrl() ?>" alt="<?= $film->getBanner()->getAlt() ?>">
            </div>

            <div>
                <h3>Les acteurs</h3>
                <div class="actors-grid">
                    <?php foreach ($film->getCharacters() as $character): ?>
                        <?php
                        $actor = $character->getActor();
                        $image = $actor->getImage();
                        ?>
                        <article class="actors-grid-item">
                            <?php if ($image): ?>
                                <img src="<?= $image->getUrl() ?>" alt="<?= $image->getAlt() ?>">
                            <?php endif; ?>
                            <h1><?= $character->getName() ?></h1>
                            <span><?= $actor->getName() ?></span>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>

            <div>
                <h3>Bande annonce</h3>
                <?php Youtube::render($film->getTrailer(),'film-trailer') ?>
            </div>

            <div>
                <h3>La gallerie</h3>
                <div class="gallery-wrapper">
                    <?php foreach ($film->getGallery()->getImages() as $image): ?>
                    <div class="gallery-item">
                        <img src="<?= $image->getUrl() ?>" alt="<?= $image->getAlt() ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <div>
                <h3>Espace commentaire</h3>
                <div class="callout">
                    <div>
                        <h4>Commentaires</h4>
                        <p>Il n'y a pas encore de commentaire</p>
                    </div>
                    <form action="" class="add-comment-form">
                        <textarea name="comment" id="comment" cols="100" rows="10"></textarea>
                        <input type="submit" class="button-black" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= \utils\Template::render('views/common/footer.php') ?>
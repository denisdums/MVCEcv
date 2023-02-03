<?= \utils\Template::render('views/common/header.php') ?>
    <div class="medium-container">
        <div class="blocks-container">
            <div class="wardrobe-wrapper">
                <?= \utils\SVG::render('wardrobe', 'wardrobe') ?>
                <h1>Narnia</h1>
                <a href="/films" class="button-black">Voir tous les films</a>
            </div>

            <h2 class="title-centered">Entrez dans le monde de Narnia</h2>

            <div class="callout">
                <div class="small-container">
                    <h3>Introduction</h3>
                    <p>
                        Narnia est un monde imaginaire créé par l'auteur irlandais Clive Staples Lewis dans lequel se
                        déroule une série de sept romans de fantasy : Le Monde de Narnia.
                        <br><br>
                        Dans l'univers de Narnia, les animaux parlent, les bêtes mythiques abondent et la magie est
                        courante. La série suit l'histoire de Narnia, depuis sa création jusqu'à sa fin, et plus
                        particulièrement les visites de groupes d'enfants de « notre » monde.
                    </p>
                </div>
            </div>

            <div class="lore-block">
                <div>
                    <h3>Le lore</h3>
                    <p>Cet univers de fiction créé par l'écrivain britannique C.S. Lewis dans son cycle de sept romans
                        pour enfants intitulé Les Chroniques de Narnia. Les histoires se déroulent dans un univers
                        parallèle où les animaux parlent et où les personnages humains peuvent entrer en passant par une
                        armoire magique. Le monde de Narnia est régi par Aslan, un lion qui est considéré comme le
                        Christ symbolique de l'univers. Les histoires suivent les aventures de différents enfants qui
                        visitent Narnia et y jouent un rôle important dans la lutte entre le bien et le mal.</p>
                </div>
                <div>
                    <?= \utils\SVG::render('castle', 'castle') ?>
                </div>
            </div>

            <div class="gallery-block">
                <h3>La galerie</h3>
                <p>Elle vous permettra de découvrir les différents paysages et personnages de Narnia. Tout d'abord, nous
                    verrons la forêt enchantée de Narnia, où les animaux parlent et où les arbres ont des formes
                    étranges. Vous pourrez également découvrir la ville de Cair Paravel, où règne le roi Aslan, ainsi
                    que les châteaux et les palais où se déroulent les intrigues des histoires.</p>

                <div class="gallery-wrapper small-container">
                    <?php foreach ((new \models\GalleryModel())->getGlobalGallery(8) as $image): ?>
                        <div class="gallery-item">
                            <img src="<?= $image->getUrl() ?>" alt="<?= $image->getAlt() ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="/galerie/" class="button-black">Voir toute la galerie</a>
            </div>

            <div class="books-block">
                <div>
                    <h3>Les livres</h3>
                    <p>Cet univers de fiction créé par l'écrivain britannique C.S. Lewis dans son cycle de sept romans
                        pour enfants intitulé Les Chroniques de Narnia. Les histoires se déroulent dans un univers
                        parallèle où les animaux parlent et où les personnages humains peuvent entrer en passant par une
                        armoire magique. Le monde de Narnia est régi par Aslan, un lion qui est considéré comme le
                        Christ symbolique de l'univers. Les histoires suivent les aventures de différents enfants qui
                        visitent Narnia et y jouent un rôle important dans la lutte entre le bien et le mal.</p>
                </div>
                <div>
                    <?= \utils\SVG::render('books', 'books') ?>
                </div>
            </div>
        </div>
    </div>
<?= \utils\Template::render('views/common/footer.php') ?>
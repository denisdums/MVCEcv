<?= \utils\Template::render('views/common/header.php') ?>
<div class="medium-container">
    <div class="blocks-container">
        <div class="wardrobe-wrapper">
            <?= \utils\SVG::render('wardrobe', 'wardrobe') ?>
            <h1>404 Error</h1>
            <a href="/" class="button-black">Retour à l'accueil</a>
        </div>
    </div>
</div>
<?= \utils\Template::render('views/common/footer.php') ?>
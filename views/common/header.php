<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Narnia</title>
    <link rel="stylesheet" href="<?= DOMAIN ?>/public/css/app.css">
    <link rel="icon" type="image/svg" href="<?= DOMAIN ?>/public/images/wardrobe.svg"/>
    <script src="<?= DOMAIN ?>/public/js/app.js" defer></script>
</head>
<body>
<?= \utils\Template::render('views/common/top-bar.php') ?>
<header>
    <div class="large-container">
        <?= \utils\SVG::render('logoNarnia', 'logo') ?>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/films">Films</a></li>
                <li><a href="/acteurs/">Acteurs</a></li>
                <li><a href="/galerie/">Gallerie</a></li>
            </ul>
        </nav>
    </div>
</header>
<main class="large-container">

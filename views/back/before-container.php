<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC Sample</title>
    <link rel="stylesheet" href="http://mvcecv.docker/public/css/app.css">
    <script src="http://mvcecv.docker/public/js/app.js" defer></script>
</head>
<body class="backend">
<?= \utils\Template::render('views/common/top-bar.php') ?>
<div>
    <div class="backend-wrapper">
        <div class="backend-menu">
            <?= \utils\Template::render('views/back/menu.php') ?>
        </div>
        <div class="backend-container">
            <div class="backend-small-container">
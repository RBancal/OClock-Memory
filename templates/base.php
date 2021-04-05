<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body>
        <header>
            <h1><?= $title ?></h1>
            <span id="button-index">
                <a href="../public/index.php">Retour à l'accueil</a>
            </span>
        </header>
        <div id="content">
            <?= $content ?>
        </div>
    </body>
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="js/game.js"></script>
</html>
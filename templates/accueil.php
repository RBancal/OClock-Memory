<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Memory</title>
</head>

<body>
<div>
    <h1>Memory - Accueil</h1>
    <p>En construction</p>
    <?php
    while($game = $games->fetch())
    {
        ?>
        <div>
            <p><?= htmlspecialchars($game->date);?></p>
            <p><?= htmlspecialchars($game->utilisateur);?></p>
            <p><?= htmlspecialchars($game->level);?></p>
            <p><?= htmlspecialchars($game->win);?></p>
            <p><?= htmlspecialchars($game->temps);?></p>
        </div>
        <br>
        <?php
    }
    $games->closeCursor();
    ?>
</div>
</body>
</html>

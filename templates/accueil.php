<?php $this->title = "Memory - Accueil" ?>
<h1>Memory - Accueil</h1>
<p>En construction</p>
<?php
foreach ($games as $game) {
    ?>
    <div>
        <p><?= htmlspecialchars($game->getDate()); ?></p>
        <p><?= htmlspecialchars($game->getUtilisateur()); ?></p>
        <p><?= htmlspecialchars($game->getLevel()); ?></p>
        <p><?= htmlspecialchars($game->getWin()); ?></p>
        <p><?= htmlspecialchars($game->getTemps()); ?></p>
    </div>
    <br>
    <?php
}
?>

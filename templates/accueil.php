<?php $this->title = "Memory - Accueil" ?>
<div id="form-user">
    <form action="../public/index.php?route=game" method="post">
        <label for="utilisateur">Utilisateur</label>
        <input type="text" id="utilisateur" name="utilisateur">
        <label for="difficulte">Difficulté</label>
        <select name="difficulte" id="difficulte">
            <option value="">Sélectionnez votre niveau</option>
            <option value="1">1 - Facile</option>
            <option value="2">2 - Moyen</option>
            <option value="3">3 - Difficile</option>
        </select>
        <input type="submit" value="Commencer à jouer !" id="submit" name="submit">
    </form>
</div>
<div id="table-users">
    <table>
        <thead>
            <tr>
                <td>Date</td>
                <td>Utilisateur</td>
                <td>Difficulté</td>
                <td>Winner</td>
                <td>Temps</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($games as $game) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($game->getDate()); ?></td>
                        <td><?= htmlspecialchars($game->getUtilisateur()); ?></td>
                        <td><?= htmlspecialchars($game->getLevel()); ?></td>
                        <td><?= htmlspecialchars($game->getWin()); ?></td>
                        <td><?= htmlspecialchars($game->getTemps()); ?></td>
                    </tr>
                    <br>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>


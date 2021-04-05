<?php $this->title = "Memory - Game" ?>
<div id="informations">
    <p>Utilisateur : <?php echo $_POST['utilisateur'] ?></p>
    <p>Difficulté : <?php echo $_POST['difficulte'] ?></p>
</div>
<div id="game-board">
    <?php
    foreach ($aMemory as $row) {
        ?>
        <div class="game-row">
            <?php
            foreach ($row as $key => $value) {
                ?>
                <div class="fruit">
                    <img class="<?php echo $value ?>" src="../public/img/cards.png" alt="">
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
<div id="progress-bar">
    <div id="progression"></div>
</div>

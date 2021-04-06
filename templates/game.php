<?php $this->title = "Memory - Game" ?>
<div id="informations">
    <p>Utilisateur : <span id="utilisateur"><?php echo $_POST['utilisateur'] ?></span></p>
    <p>Difficulté : <span id="difficulte"><?php echo $_POST['difficulte'] ?></span></p>
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

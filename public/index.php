<?php

require '../config/dev.php';
require '../vendor/autoload.php';

try{
    if(isset($_GET['route']))
    {
        if($_GET['route'] === 'game'){
            require '../templates/game.php';
        }
        else{
            echo 'page inconnue';
        }
    }
    else{
        require '../templates/accueil.php';
    }
}
catch (Exception $e)
{
    echo 'Erreur';
}

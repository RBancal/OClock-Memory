<?php


namespace Memory\Controller;


use Memory\DAO\GameDAO;

class Memory
{
    public function accueil()
    {
        $game = new GameDAO();
        $games = $game->getResults();

        require '../templates/accueil.php';
    }

    public function game()
    {
        $game = new GameDAO();
        $games = $game->getResults();

        require '../templates/game.php';
    }
}
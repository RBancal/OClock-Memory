<?php


namespace Memory\Controller;


use Memory\DAO\GameDAO;
use Memory\Model\View;

class Memory
{
    private $gameDAO;
    private $view;

    public function __construct()
    {
        $this->gameDAO = new GameDAO();
        $this->view = new View();
    }

    public function accueil()
    {
        $games = $this->gameDAO->getResults();

        return $this->view->render('accueil', [
            'games' => $games,
        ]);
    }

    public function game()
    {
        $games = $this->gameDAO->getResults();

        return $this->view->render('game', [
            'games' => $games,
        ]);
    }
}
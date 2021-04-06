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

    public function endGame($post) {
        $game = $this->gameDAO->saveResult($post);

        return json_encode($game);
    }

    public function game()
    {
        if (!isset($_POST['difficulte'])) header("Location: ./index.php");
        $level = $_POST['difficulte'];
        $aMemory = array_fill(0, 4, []);

        switch ($level) {
            case 1:
                $aCards = ['pomme', 'banane', 'orange', 'citron-vert', 'grenade', 'abricot', 'citron', 'fraise', 'pomme-verte', 'peche'];
                $aMemory = $this->createArray($aMemory, 5);
                $aMemory = $this->populateArray($aMemory, $aCards, 9);
                break;
            case 2:
                $aCards = ['pomme', 'banane', 'orange', 'citron-vert', 'grenade', 'abricot', 'citron', 'fraise', 'pomme-verte', 'peche', 'raisin', 'pasteque', 'prune', 'poire'];
                $aMemory = $this->createArray($aMemory, 7);
                $aMemory = $this->populateArray($aMemory, $aCards, 13);
                break;
            case 3:
                $aCards = ['pomme', 'banane', 'orange', 'citron-vert', 'grenade', 'abricot', 'citron', 'fraise', 'pomme-verte', 'peche', 'raisin', 'pasteque', 'prune', 'poire', 'cerise', 'framboise', 'mangue', 'cerise-jaune'];
                $aMemory = $this->createArray($aMemory, 9);
                $aMemory = $this->populateArray($aMemory, $aCards, 17);
                break;
        }

        $games = $this->gameDAO->getResults();

        return $this->view->render('game', [
            'games' => $games,
            'aMemory' => $aMemory
        ]);
    }

    private function createArray(array $aMemory, int $nbrCases)
    {
        for ($i = 0; $i < 4; $i++) {
            $aMemory[$i] = array_fill(0, $nbrCases, []);
        }

        return $aMemory;
    }

    private function populateArray(array $aMemory, array $aCards, int $indexLevel)
    {
        $index = 0;

        $rows = sizeof($aMemory);
        for ($i = 0; $i < $rows; $i++) {
            $cols = sizeof($aMemory[$i]);
            for ($j = 0; $j < $cols; $j++) {
                $aMemory[$i][$j] = $aCards[$index];
                $index < $indexLevel ? $index++ : $index = 0;
            }
            shuffle($aMemory[$i]);
        }

        shuffle($aMemory);

        return $aMemory;
    }
}
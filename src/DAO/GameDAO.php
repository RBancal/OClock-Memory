<?php

namespace Memory\DAO;


use Memory\Model\Game;

class GameDAO extends DAO
{
    private function populateObject($row)
    {
        $game = new Game();
        $game->setId($row['id']);
        $game->setDate($row['date']);
        $game->setUtilisateur($row['utilisateur']);
        $game->setLevel($row['level']);
        $game->setWin($row['win']);
        $game->setTemps($row['temps']);

        return $game;
    }

    public function getResults()
    {
        $sql = 'SELECT id, date, utilisateur, level, win, temps FROM game ORDER BY temps DESC';
        $result = $this->createQuery($sql);

        $games = [];
        foreach ($result as $row){
            $games[$row['id'] - 1] = $this->populateObject($row);
        }
        $result->closeCursor();

        return $games;
    }
}
<?php

namespace Memory\DAO;


class GameDAO extends DAO
{
    public function getResults()
    {
        $sql = 'SELECT id, date, utilisateur, level, win, temps FROM game ORDER BY temps DESC';
        $result = $this->createQuery($sql);

        return $result;
    }
}
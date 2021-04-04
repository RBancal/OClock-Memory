<?php


namespace Memory\Model;


/**
 * Class Game
 * @package Model
 */
class Game
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $date;

    /**
     * @var string
     */
    private $utilisateur;

    /**
     * @var integer
     */
    private $level;

    /**
     * @var boolean
     */
    private $win;

    /**
     * @var integer
     */
    private $temps;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): string
    {
        return $this->date = $date;
    }

    /**
     * @return string
     */
    public function getUtilisateur(): string
    {
        return $this->utilisateur;
    }

    /**
     * @param string $utilisateur
     */
    public function setUtilisateur(string $utilisateur): void
    {
        $this->utilisateur = $utilisateur;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return bool
     */
    public function getWin(): bool
    {
        return $this->win;
    }

    /**
     * @param bool $win
     */
    public function setWin(bool $win): void
    {
        $this->win = $win;
    }

    /**
     * @return int
     */
    public function getTemps(): int
    {
        return $this->temps;
    }

    /**
     * @param int $temps
     */
    public function setTemps(int $temps): void
    {
        $this->temps = $temps;
    }
}
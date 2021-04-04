<?php


namespace Memory\DAO;


use PDO;
use Exception;


abstract class DAO
{
    const DB_HOST = 'mysql:host=localhost:3305;dbname=memory;charset=utf8';
    const DB_USER = 'oclock';
    const DB_PASS = 'G4m3M3m0r';

    private $connexion;

    private function checkConnexion()
    {
        // Si la connexion n'existe pas, la création se fait avec la méthode getConnexion
        if ($this->connexion === null) {
            return $this->getConnexion();
        }
        // Si la connexion est existante, celle-ci est récupérée
        return $this->connexion;
    }

    private function getConnexion()
    {
        //Tentative de connexion à la base de données
        try {
            $connexion = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie un message avec le mot-clé return
            return $connexion;
        } //On lève une erreur si la connexion échoue
        catch (Exception $errorConnexion) {
            die ('Erreur de connexion :' . $errorConnexion->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnexion()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnexion()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }
}

<?php


namespace Memory\config;


use Exception;
use Memory\Controller\Error;
use Memory\Controller\Memory;


class Router
{
    private $memoryController;
    private $errorController;

    public function __construct()
    {
        $this->memoryController = new Memory();
        $this->errorController = new Error();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'game'){
                    $this->memoryController->game();
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->memoryController->accueil();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->errorServer();
        }
    }
}
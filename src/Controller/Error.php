<?php


namespace Memory\Controller;


class Error
{
    public function errorNotFound()
    {
        require '../templates/error_404.php';
    }

    public function errorServer()
    {
        require '../templates/error_500.php';
    }
}
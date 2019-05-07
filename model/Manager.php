<?php

class Manager
{
    //private $db;

    protected function __construct()
    {
        try
        {
        $db = new PDO('mysql:host=localhost; dbname=projet_4;charset=utf8', 'root', '');
        return $db;
        }
        catch (exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}
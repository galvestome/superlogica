<?php

class Conexao {

    private $pdo;
    private $hostname = 'localhost:3307';
    private $dbname = 'superlogica';
    private $username = 'root';
    private $password = 'root';
    public $msg = "";

    public function conectar() {
        global $pdo;

        try {
            $pdo = new PDO("mysql:host=".$hostname.";dbname=".$dbname."", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch(PDOException $e) {
            global $msg;
            $msg = $e->getMessage();
        }
    }
}





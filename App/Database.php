<?php

namespace App;

use App\Interfaces\iDatabase;
use PDO;

class Database implements iDatabase
{
    private static $_instance;

    private $settings;

    private $pdo;

    public function __construct()
    {
        $this->settings = require dirname(__DIR__) . '\\config\\database.php';

    }

    public static function getInstance()
    {
        if (self::$_instance === NULL) {

            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    private function getPDO()
    {
        if($this->pdo === null) {

            $pdo = new PDO('mysql:host='.$this->settings['host'].';dbname='.$this->settings['database'],$this->settings['username'],$this->settings['password']);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
}
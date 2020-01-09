<?php


namespace App;


class Config
{
    private static $_instance;

    private $settings = [];

    public function __construct()
    {
        $this->settings = require dirname(__DIR__) . '\\config\\config.php';
    }

    public static function getInstance()
    {
        if(self::$_instance === null) {

            self::$_instance = new Config();
        }
        return self::$_instance;
    }
}
<?php

namespace App;

use App\Config;

require dirname(__DIR__).'/vendor/autoload.php';

$config = Config::getInstance();

$database = Database::getInstance();
<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Utils\View;
use \App\Common\Environment;
use \App\Common\Database;

// Loads all environment variables from .env file
Environment::load(__DIR__.'/../');

// Database Settings
Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT')
);

// Sets default URL
View::init([
    'BASE_URL' => getenv('BASE_URL')
]);

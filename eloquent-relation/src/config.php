<?php

require_once __DIR__.'/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// .envの読み込み
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// illuminate/databaseを利用可能に
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('MYSQL_HOST'),
    'database'  => getenv('MYSQL_DATABASE'),
    'username'  => getenv("MYSQL_USER"),
    'password'  => getenv("MYSQL_PASSWORD"),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

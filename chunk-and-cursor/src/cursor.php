<?php

define('SRC_DIR', dirname(__FILE__));

require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

$capsule->getConnection()->enableQueryLog();

foreach (Book::cursor() as $book) {
    echo $book->name , "\n";
}

$queryLog = $capsule->getConnection()->getQueryLog();

foreach ($queryLog as $i => $query) {
    echo 'Query' . ($i + 1) . ': ' . $query['query'] . PHP_EOL;
}
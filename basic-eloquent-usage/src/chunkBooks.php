<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

Book::chunk(2, function ($books) {
    foreach ($books as $book) {
        echo $book->name , "\n";
    }
});
<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

$books = Book::all()->toArray();

if (!empty($books)) {
    foreach($books as $book) {
        echo $book['isbn'], "\t" , ($book['name']), "\t", $book['author'], "\t", $book['created'], "\t", $book['updated'], PHP_EOL;
    }
}


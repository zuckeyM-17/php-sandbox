<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

echo "Get All Books" , PHP_EOL;
$books = Book::all();

foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

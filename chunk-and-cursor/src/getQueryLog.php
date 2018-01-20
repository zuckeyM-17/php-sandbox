<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

$capsule->getConnection()->enableQueryLog();

echo "Get 川原's Book" , PHP_EOL;
$books = Book::query()
    ->where('author', '=', '川原　礫')
    ->get();

var_dump($capsule->getConnection()->getQueryLog());

foreach($books as $book) {
    echo $book->id, "\t", $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

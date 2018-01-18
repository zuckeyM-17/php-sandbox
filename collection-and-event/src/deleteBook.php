<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

Book::where('isbn', '=', '978-4-04-713811-7')->delete();

$books = Book::all();
foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}
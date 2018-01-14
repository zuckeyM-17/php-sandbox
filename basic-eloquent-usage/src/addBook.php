<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

$newBook = new Book();
$newBook->id = 6;
$newBook->isbn = '978-4-04-713811-7';
$newBook->name = '涼宮ハルヒの憂鬱';
$newBook->author = 'ツガノ ガク';
$newBook->save();

$books = Book::all();
foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}
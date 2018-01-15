<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

$newBook = new Book();
$newBook->fill([
    'id' => 111,
    'isbn' => '978-4-04-713811-7',
    'name' => '涼宮ハルヒの憂鬱',
    'author' => '谷川 流',
]);
$newBook->save();

$books = Book::all();
foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}
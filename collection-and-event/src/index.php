<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');
require_once(SRC_DIR. '/BookScope.php');

echo "Query With Global Scope" , PHP_EOL;
$books = Book::all();

foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

echo PHP_EOL;
echo "Query Without Global Scope" , PHP_EOL;
$books = Book::withoutGlobalScope(BookScope::class)->get();

foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

echo PHP_EOL;
echo "Query With Local Scope" , PHP_EOL;
$books = Book::recent()->get();

foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

echo PHP_EOL;
echo "Query With Dynamic Scope" , PHP_EOL;
$books = Book::ofId(3)->get();

foreach($books as $book) {
    echo $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

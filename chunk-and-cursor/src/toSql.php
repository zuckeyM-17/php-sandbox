<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Book.php');

echo "Get 川原's Book" , PHP_EOL;
$query = Book::query()
    ->where('author', '=', '川原　礫');

$sql = $query->toSql();

echo 'Query: ' . $sql . PHP_EOL;

foreach($query->get() as $book) {
    echo $book->id, "\t", $book->isbn, "\t" , $book->name, "\t", $book->author, "\t", $book->created_at, "\t", $book->updated_at, PHP_EOL;
}

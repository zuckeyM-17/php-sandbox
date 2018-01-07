<?php

define('SRC_DIR', dirname(__FILE__));

$db = new PDO("sqlite:" . SRC_DIR . "/app.db");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$stmt = $db->query('SELECT * FROM `books`;');
if ($books = $stmt->fetchAll()) {
    foreach($books as $book) {
        echo $book['isbn'], "\t" , ($book['name']), "\t", $book['author'], "\t", $book['created'], "\t", $book['updated'], PHP_EOL;
    }
}


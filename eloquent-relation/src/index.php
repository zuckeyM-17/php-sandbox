<?php

require_once __DIR__.'/config.php';

try {
    $db = new PDO("mysql:host=".getenv("MYSQL_HOST").";dbname=".getenv("MYSQL_DATABASE").";charset=utf8;",
        getenv("MYSQL_USER"),
        getenv("MYSQL_PASSWORD"));

    $sql = "INSERT INTO users VALUES (null, ?,?,?,?);";

    $now = date('Y-m-d H:i:s');
    $stmt = $db->prepare($sql);

    $stmt->execute([
        '松村',
        'zuckey',
        $now,
        $now
    ]);
    
} catch(Exception $e) {
    var_dump($e->getMessage());
}

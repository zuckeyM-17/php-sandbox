<?php

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=test;charset=utf8;', 'db_user', 'password');

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
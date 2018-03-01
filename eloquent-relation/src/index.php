<?php

require_once __DIR__.'/config.php';
require_once __DIR__.'/Model/User.php';

try {
    $now = date('Y-m-d H:i:s');
    User::create([
        'name' => '松村',
        'screan_name' => 'zuckey',
        'created_at' => $now,
        'updated_at' => $now,
    ]);
} catch(Exception $e) {
    var_dump($e->getMessage());
}

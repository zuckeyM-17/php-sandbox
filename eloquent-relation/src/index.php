<?php

require_once __DIR__.'/config.php';
require_once __DIR__.'/Model/User.php';

try {
    User::create([
        'name' => '松村',
        'screan_name' => 'zuckey',
    ]);
} catch(Exception $e) {
    var_dump($e->getMessage());
}

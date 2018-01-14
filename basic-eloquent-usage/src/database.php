<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'sqlite',
    'database'  => SRC_DIR . '/app.db',    
]);

// Illuminate DatabaseのインスタンスをCapsuleでアクセス可能にする
$capsule->setAsGlobal();
// Eloquent ORMを起動
$capsule->bootEloquent();
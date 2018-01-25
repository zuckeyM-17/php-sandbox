<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Inn.php');

echo "Get All Inns" , PHP_EOL;

foreach(Inn::all() as $inn) {
    print($inn->name . PHP_EOL);
}

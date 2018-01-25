<?php

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Inn.php');

echo "CHECK MEMORY" , PHP_EOL;

$start = microtime(true);

foreach(Inn::all() as $inn) {
    print($inn->name . PHP_EOL);
}

$time = microtime(true) - $start;
$memory = memory_get_peak_usage(true) / 1024 / 1024;
echo '==================' . PHP_EOL;
printf('time: %f memory: %f MB', $time, $memory);



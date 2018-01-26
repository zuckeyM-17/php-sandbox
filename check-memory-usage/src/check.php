<?php

ini_set('memory_limit', '256M');

$arr = [
    'all',
    'chunk100',
    'chunk1000',
    'cursor',
];

if (!isset($argv[1]) || !in_array($argv[1], $arr)) {
    print('command ' . $argv[1] . ' is not supported');
    exit;
}

define('SRC_DIR', dirname(__FILE__));
require_once(SRC_DIR . '/vendor/autoload.php');
require_once(SRC_DIR . '/database.php');
require_once(SRC_DIR. '/Inn.php');

$capsule->getConnection()->enableQueryLog();

echo "CHECK MEMORY USAGE\n";
echo "==================\n";

$start = microtime(true);

require_once(SRC_DIR. '/scripts/' . $argv[1] . '.php');

$time = microtime(true) - $start;
$memory = memory_get_peak_usage(true) / 1024 / 1024;
echo "\n==================\n";
printf("time: %f memory: %f MB" . "\n", $time, $memory);

$queryLog = $capsule->getConnection()->getQueryLog();
foreach ($queryLog as $i => $query) {
    echo 'Query' . ($i + 1) . ': ' . $query['query'] . PHP_EOL;
}



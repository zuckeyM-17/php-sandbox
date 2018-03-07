<?php

require_once __DIR__.'/config.php';
require_once __DIR__.'/Model/Episode.php';

try {
    $episodes = Episode::all();
    foreach($episodes as $episode) {
        print($episode->title . PHP_EOL);
    }
} catch(Exception $e) {
    var_dump($e->getMessage());
}

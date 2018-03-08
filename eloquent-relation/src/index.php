<?php

namespace App;

require_once __DIR__.'/config.php';
require_once __DIR__.'/Model/Episode.php';
require_once __DIR__.'/Model/EpisodeContent.php';
require_once __DIR__.'/Model/Cast.php';
require_once __DIR__.'/Model/EpisodeCast.php';

try {
    $episode = Episode::with('episodeContents', 'casts')->find(1);
    // $episode->episodeContents->map(function(EpisodeContent $episodeContent) {
    //     echo $episodeContent->text . PHP_EOL;
    // });

    echo $episode->toJson();

} catch(Exception $e) {
    var_dump($e->getMessage());
}

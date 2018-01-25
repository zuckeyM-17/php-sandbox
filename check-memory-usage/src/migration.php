<?php

define('SRC_DIR', dirname(__FILE__));

if (!file_exists(SRC_DIR.'/app.db')) {
    try {
        echo 'create /app.db ... '; flush();
        if (($db = new PDO('sqlite:' . SRC_DIR . '/app.db')) && ($db->query('PRAGMA journal_mode=TRUNCATE;') !== false)) {
            echo 'done',PHP_EOL; flush();
            $db->beginTransaction();

            echo 'create an "inns" table in /app.db ... '; flush();

            $db->query('CREATE TABLE IF NOT EXISTS `inns` ('.PHP_EOL.
                '    `id`         INTEGER PRIMARY KEY AUTOINCREMENT,'.PHP_EOL.
                '    `key`        TEXT UNIQUE NOT NULL,'.PHP_EOL.
                '    `name`       TEXT NOT NULL,'.PHP_EOL.
                '    `address`    TEXT NOT NULL,'.PHP_EOL.
                '    `tel`        TEXT,' .PHP_EOL.
                '    `url`        TEXT,' .PHP_EOL.
                '    `longitude`  TEXT,' .PHP_EOL.
                '    `latitude`   TEXT,' .PHP_EOL.
                '    `position_info_code` TEXT'.PHP_EOL.');');
            echo 'done',PHP_EOL; flush();

            $file = fopen("./hotel_ichiran201712.csv", "r");
            while($line = fgetcsv($file)){
            var_dump($line);
            }
            fclose($f);

            $db->commit();
        }
        else {
            echo 'error',PHP_EOL; flush();
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    echo '/app.db exists';
}
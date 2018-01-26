<?php

define('SRC_DIR', dirname(__FILE__));

if (!file_exists(SRC_DIR.'/app.db')) {
    prepareDb();
} else {
    echo '/app.db exists', PHP_EOL; flush();
    echo 'delete /app.db ...'; flush();
    unlink(SRC_DIR.'/app.db');
    echo 'done', PHP_EOL; flush();
    prepareDb();
}


function prepareDb() {
    try {
        echo 'create /app.db ... '; flush();
        if (($db = new PDO('sqlite:' . SRC_DIR . '/app.db')) && ($db->query('PRAGMA journal_mode=TRUNCATE;') !== false)) {
            echo 'done',PHP_EOL; flush();
            $db->beginTransaction();

            echo 'create an "inns" table in /app.db ... '; flush();

            $db->query('CREATE TABLE IF NOT EXISTS `inns` ('.PHP_EOL.
                '    `id`         INTEGER PRIMARY KEY AUTOINCREMENT,'.PHP_EOL.
                '    `key`        TEXT NOT NULL,'.PHP_EOL.
                '    `name`       TEXT NOT NULL,'.PHP_EOL.
                '    `address`    TEXT NOT NULL,'.PHP_EOL.
                '    `tel`        TEXT,' .PHP_EOL.
                '    `url`        TEXT,' .PHP_EOL.
                '    `longitude`  TEXT,' .PHP_EOL.
                '    `latitude`   TEXT,' .PHP_EOL.
                '    `position_info_code` TEXT'.PHP_EOL.');');
            echo 'done',PHP_EOL; flush();

            for ($i = 0; $i < 40; $i++) {
                $file = fopen("./hotel_ichiran201712.csv", "r");
                while($line = fgetcsv($file)){
                    $stmt = $db->prepare('INSERT INTO inns (`key`, `name`, `address`, `tel`, `url`, `longitude`, `latitude`, `position_info_code`) VALUES ' . PHP_EOL .
                    '("' . $line[0] . '", "' . $line[1] . '", "' . $line[2] . '", "' . $line[3] . '", "' . $line[4] . '", "' . $line[5] . '", "' . $line[6] . '", "' . $line[7] . '");');
                    $stmt->execute();
                }
                fclose($file);

                $file = fopen("./ryokan_ichiran201712.csv", "r");
                while($line = fgetcsv($file)){
                    $stmt = $db->prepare('INSERT INTO inns (`key`, `name`, `address`, `tel`, `url`, `longitude`, `latitude`, `position_info_code`) VALUES ' . PHP_EOL .
                    '("' . $line[0] . '", "' . $line[1] . '", "' . $line[2] . '", "' . $line[3] . '", "' . $line[4] . '", "' . $line[5] . '", "' . $line[6] . '", "' . $line[7] . '");');
                    $stmt->execute();
                }
                fclose($file);
            }

            $db->commit();
        }
        else {
            echo 'error',PHP_EOL; flush();
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
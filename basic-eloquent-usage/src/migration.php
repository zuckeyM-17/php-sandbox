<?php

define('SRC_DIR', dirname(__FILE__));

if (!file_exists(SRC_DIR.'/app.db')) {
    try {
        echo 'create /app.db ... '; flush();
        if (($db = new PDO('sqlite:' . SRC_DIR . '/app.db')) && ($db->query('PRAGMA journal_mode=TRUNCATE;') !== false)) {
            echo 'done',PHP_EOL; flush();
            $db->beginTransaction();
            echo 'create an "books" table in /app.db ... '; flush();
            $db->query('CREATE TABLE IF NOT EXISTS `books` ('.PHP_EOL.
                '    `id`         INTEGER PRIMARY KEY AUTOINCREMENT,'.PHP_EOL.
                '    `isbn`       TEXT UNIQUE NOT NULL,'.PHP_EOL.
                '    `name`       TEXT NOT NULL,'.PHP_EOL.
                '    `author`     TEXT NOT NULL,'.PHP_EOL.
                '    `created_at`    TEXT,'.PHP_EOL.
                '    `updated_at`    TEXT'.PHP_EOL.');');
            echo 'done',PHP_EOL; flush();

            echo 'prepare data at "books" table in /app.db ... '; flush();
            $now = date('c');
            $db->query('INSERT INTO books (`isbn`, `name`, `author`, `created_at`, `updated_at`) VALUES '.PHP_EOL.
                '("978-4-04-867760-8", "SAO 1 ｱｲﾝｸﾗｯﾄﾞ", "川原　礫", "'.$now. '", "' .$now . '"),'.PHP_EOL.
                '("978-4-8402-3353-8", "とらドラ！", "竹宮　ゆゆこ", "'.$now. '", "' .$now . '"),'.PHP_EOL.
                '("978-4-8401-1647-3", "ゼロの使い魔　1", "望月　奈々", "'.$now. '", "' .$now . '");');
            echo 'done',PHP_EOL; flush();
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
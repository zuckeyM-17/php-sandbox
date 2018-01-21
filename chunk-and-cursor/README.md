# EloquentのCollection、Event

こちら↓のブログの確認用の実装です。
[Eloquent ORMのChunkとCursorについて調べた](http://blog.zuckey17.org/entry/2018/01/21/093115)

## 動作確認

- PHP 7.2
- SQLite3 3.13.x

SQLiteファイルを作成し、データを入れます。

```
$ pwd
~~~/php-sandbox/use-eloquent-at-pure-php-app
$ php ./src/migration.php
create /app.db ... done
create an "books" table in /app.db ... done
prepare data at "books" table in /app.db ... done
```

srcディレクトリに入り、composer.pharを入手します。

```
$ cd ./src
$ curl -sS https://getcomposer.org/installer | php
All settings correct for using Composer
Downloading...

Composer (version 1.6.2) successfully installed to: /Users/matsumura/dev/src/github.com/zuckeyM-17/php-sandbox/use-eloquent-at-pure-php-app/src/composer.phar
Use it: php composer.phar
```

Eloquent (illuminate/database)をダウンロードします。
```
$ ./composer.phar require illuminate/database

Using version ^5.5 for illuminate/database
./composer.json has been updated
Loading composer repositories with package information
~~~~~~~~~~~~~~~~~~~
Writing lock file
Generating autoload files
```

データを取り出します。

```
$ php index.php
Get All Books
978-4-04-867760-8       SAO 1 ｱｲﾝｸﾗｯﾄﾞ  川原　礫        2018-01-18 18:42:14     2018-01-18 18:42:14
978-4-8402-3353-8       とらドラ！      竹宮　ゆゆこ    2018-01-18 18:42:14     2018-01-18 18:42:14
978-4-8401-1647-3       ゼロの使い魔　1 望月　奈々      2018-01-18 18:42:14     2018-01-18 18:42:14
```

データを追加します。
```
$ php addBook.php
A Book Added
978-4-04-867760-8       SAO 1 ｱｲﾝｸﾗｯﾄﾞ  川原　礫        2018-01-18 18:42:14     2018-01-18 18:42:14
978-4-8402-3353-8       とらドラ！      竹宮　ゆゆこ    2018-01-18 18:42:14     2018-01-18 18:42:14
978-4-8401-1647-3       ゼロの使い魔　1 望月　奈々      2018-01-18 18:42:14     2018-01-18 18:42:14
978-4-04-429201-0       涼宮ハルヒの憂鬱        谷川 流 2018-01-18 18:58:49     2018-01-18 18:58:49
```

chunkメソッドのSQLを確認する
```
$ php chunk.php
SAO 1 ｱｲﾝｸﾗｯﾄﾞ
アクセルワールド1
とらドラ！
ゴールデンタイム1
ゼロの使い魔　1
Query1: select * from "books" where "books"."deleted_at" is null order by "books"."id" asc limit 2 offset 0
Query2: select * from "books" where "books"."deleted_at" is null order by "books"."id" asc limit 2 offset 2
Query3: select * from "books" where "books"."deleted_at" is null order by "books"."id" asc limit 2 offset 4

```

cursorメソッドのSQLを確認する
```
$ php cursor.php
SAO 1 ｱｲﾝｸﾗｯﾄﾞ
アクセルワールド1
とらドラ！
ゴールデンタイム1
ゼロの使い魔　1
Query1: select * from "books" where "books"."deleted_at" is null
```


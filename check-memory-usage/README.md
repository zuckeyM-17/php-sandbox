# Eloquent ORMのChunkとCursorにおけるメモリ使用量について

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

## 実行

```
$ php check.php all
CHECK MEMORY USAGE
==================
縄文の宿まんてんル華耀亭や亭ザ・サンプラザート
==================
time: 1.418852 memory: 172.007812 MB
Query1: select * from "inns"
```

```
$ php check.php chunk100
CHECK MEMORY USAGE
==================
縄文の宿まんてんル華耀亭や亭ザ・サンプラザート
==================
time: 9.412318 memory: 4.000000 MB
Query1: select * from "inns" order by "inns"."id" asc limit 100 offset 0
Query2: select * from "inns" order by "inns"."id" asc limit 100 offset 100
~~~~~
Query978: select * from "inns" order by "inns"."id" asc limit 100 offset 97700
Query979: select * from "inns" order by "inns"."id" asc limit 100 offset 97800
```

```
$ php check.php chunk1000
CHECK MEMORY USAGE
==================
縄文の宿まんてんル華耀亭や亭ザ・サンプラザート
==================
time: 1.720385 memory: 6.000000 MB
Query1: select * from "inns" order by "inns"."id" asc limit 1000 offset 0
Query2: select * from "inns" order by "inns"."id" asc limit 1000 offset 1000
~~~~
Query97: select * from "inns" order by "inns"."id" asc limit 1000 offset 96000
Query98: select * from "inns" order by "inns"."id" asc limit 1000 offset 97000
```

```
$ php check.php cursor
CHECK MEMORY USAGE
==================
縄文の宿まんてんル華耀亭や亭ザ・サンプラザート
==================
time: 1.620625 memory: 4.000000 MB
Query1: select * from "inns"
```

## 利用したデータ・セット

### 歩行者移動支援サービスに関するデータサイト

- 国際観光ホテル整備法に基づいて登録されたホテル・旅館
    - https://www.hokoukukan.go.jp/metadata/resource/81

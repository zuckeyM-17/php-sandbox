# Eloquentの基本的な使い方

こちら↓のブログの確認用の実装です。
[Eloquent ORMについてなにも知らなかった（1） - 基本的な使い方編 -](http://blog.zuckey17.org/entry/2018/01/14/214919)

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

データを追加します。
```
$ php ./src/addBook.php
```

データを取り出します。

```
$ php ./src/index.php
Query With Global Scope
978-4-8401-1647-3       ゼロの使い魔　1 望月　奈々      2018-01-14 02:31:08     2018-01-14 02:31:08
978-4-04-429201-0       涼宮ハルヒの憂鬱        谷川 流     2018-01-14 02:31:13     2018-01-14 02:31:13

Query Without Global Scope
978-4-04-867760-8       SAO 1 ｱｲﾝｸﾗｯﾄﾞ  川原　礫        2018-01-14 02:31:08     2018-01-14 02:31:08
978-4-8402-3353-8       とらドラ！      竹宮　ゆゆこ    2018-01-14 02:31:08     2018-01-14 02:31:08
978-4-8401-1647-3       ゼロの使い魔　1 望月　奈々      2018-01-14 02:31:08     2018-01-14 02:31:08
978-4-04-429201-0       涼宮ハルヒの憂鬱        谷川 流     2018-01-14 02:31:13     2018-01-14 02:31:13

Query With Local Scope
978-4-04-429201-0       涼宮ハルヒの憂鬱        谷川 流     2018-01-14 02:31:13     2018-01-14 02:31:13

Query With Dynamic Scope
978-4-8401-1647-3       ゼロの使い魔　1 望月　奈々      2018-01-14 02:31:08     2018-01-14 02:31:08
```

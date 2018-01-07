# Illuminate Database

`Illuminate Database`コンポーネントはPHPでデータベースを扱うための全ての道具をまとめたものです。表現力の高い`クエリビルダー`、`ActiveRecord`的なORM、スキーマビルダーが含まれます。現在は、`MySQL`、`Postgres`、`SQL Server`、`SQLite`をサポートしており、LaravelというPHPのフレームワークのデータベース層の一部としても提供されています。

## 導入するには

初めに、`Capsule\Manager`のインスタンスを新たに作成します。`Capsule`はこのコンポーネントをLaravelフレームワーク以外でライブラリとしてより簡単に使うためのものです。

```:php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'database',
    'username'  => 'root',
    'password'  => 'password',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Eloquentのモデルで用いられるイベントディスパッチャーを設定（任意）
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// staticメソッドからグローバルに`Capsule`インスタンスを利用できるようにする（任意）
$capsule->setAsGlobal();

// Eloquent ORMを設定（setEventDispatcher()を利用しない場合は、任意）
$capsule->bootEloquent();
```

> Eloquentとオブザーバーを利用する必要があれば、`composer require "illuminate/events"`が必要です。

一度`Capsule`インスタンスが登録されれば、以下のような機能を利用することができます。

## クエリビルダーを使う

```:php
$users = Capsule::table('users')->where('votes', '>', 100)->get();
```

他の主なメソッドについても、LaravelのDBファサードの場合と同様、`Capsule`から直接扱うことができます。

```:php
$results = Capsule::select('select * from users where id = ?', array(1));
```

## スキーマビルダーを使う

```:php
Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});
```

## Eloquent ORMを使う

```:php
class User extends Illuminate\Database\Eloquent\Model {}

$users = User::where('votes', '>', 1)->get();
```

このライブラリによってデータベースのさまざまな機能を使うことができますが、さらに踏み込んだドキュメントについては、[Laravel framework documentation](https://laravel.com/docs/5.5)を参照してください。

<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule = new Capsule();
$capsule->addConnection( [
  'driver' => Driver,
  'host' => Host,
  'username' => DBUser,
  'password' => DBPassword,
  'database' => Database,
  'charset' =>'utf8',
  'collation' => 'utf8_unicode_ci'
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

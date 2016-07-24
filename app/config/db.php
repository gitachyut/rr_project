<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule = new Capsule();
$capsule->addConnection( [
  'driver'    =>  Driver,
  'host'      =>  Host,
  'username'  =>  DBUser,
  'password'  =>  DBPassword,
  'database'  =>  Database,
  'charset'   =>  Charset,
  'collation' =>  Collation
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

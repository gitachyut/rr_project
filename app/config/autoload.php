<?php
/*
*  autoload methods are registered here
*/
function autoloadModel($className) {
    $filename = __DIR__."/../models/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadController($className) {
    $filename = __DIR__."/../controllers/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }

}
function autoloadLib($className) {
    $filename = __DIR__."/../lib/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function autoloadCore($className) {
    $filename = __DIR__."/../core/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}
function none($className) {
    $filename = __DIR__."/../core/PageNotFound.php";
    require $filename;
    new PageNotFound();
}

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadLib");
spl_autoload_register("autoloadCore");

spl_autoload_register("none");

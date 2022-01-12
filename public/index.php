<?php
require '../autoload.php';
$routes = new \cars\Routes();

$entryPoint = new \CSY2028\EntryPoint($routes);

$entryPoint->run();

<?php

require_once __DIR__. '/../vendor/autoload.php';

$configs = require __DIR__ . '/../config/app.conf.php';

use Service\DBConnector;
DBConnector::setConfig($configs['db']);

$map = [
  '' => __DIR__ . '/../src/Controller/index.php',
  '/register' => __DIR__ . '/../src/Controller/register.php',
    '/login' =>   __DIR__ . '/../src/Controller/login.php',
    '/logout' => __DIR__ . '/../src/Controller/logout.php',
    '/student' => __DIR__ . '/../src/Controller/studentCreate.php',
    '/studentList' => __DIR__ . '/../src/Controller/studentList.php',
    '/studentInit' => __DIR__ . '/../src/Controller/studentInit.php',
    '/studentRead' => __DIR__ . '/../src/Controller/studentRead.php',
    '/studentDelete' => __DIR__ . '/../src/Controller/studentDelete.php',
    '/groupGenerator' => __DIR__ . '/../src/Controller/groupGenerator.php'
];

$url = $_SERVER['REQUEST_URI'];

if (substr($url,0, strlen('/index.php')) == '/index.php'){
    $url=substr($url, strlen('/index.php'));
} else if ($url == "/"){
    $url = '';
}

$searchElement = explode ("?", $url, 2);

if (array_key_exists ($searchElement[0], $map)){
    include $map[$searchElement[0]];
}

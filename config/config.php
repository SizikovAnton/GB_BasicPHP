<?php
//TODO сделать пути абсолютными
//Файл констант

define('ROOT', dirname(__DIR__));

define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');
//define('GALLERY', $_SERVER['DOCUMENT_ROOT'] . '/upload/gallery/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'geekbrains');

//Тут же подключим основные функции-модули нашего приложения
include ROOT . "/engine/db.php";
include ROOT . "/engine/functions.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/gallery.php";
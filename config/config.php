<?php
//TODO сделать пути абсолютными
define("ROOT", dirname(__DIR__));
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . "/images/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/images/gallery_img/small/");
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'root');
define('PASS', '');
define('DB', 'geekbrains');


include ROOT . "/engine/db.php";
include ROOT . "/engine/core.php";

autoload("controllers");
autoload("models");
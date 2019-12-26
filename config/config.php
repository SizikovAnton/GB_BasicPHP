<?php
//TODO сделать пути абсолютными
//Файл констант
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'geek');
define('PASS', '12345');
define('DB', 'geekbrains');

//Тут же подключим основные функции-модули нашего приложения
include "../engine/db.php";
include "../engine/feedback.php";
include "../engine/functions.php";
include "../engine/log.php";
include "../engine/news.php";
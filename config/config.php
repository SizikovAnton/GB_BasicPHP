<?php
//TODO сделать пути абсолютными
define('TEMPLATES_DIR', dirname(__DIR__) . '/templates/');
define('LAYOUTS_DIR', '/layouts/'); //Не смог изменить на абсолютный, не изменив при этом функцию renderTemplate()
define('ENGINE', dirname(__DIR__) . '/engine/');

include "../engine/functions.php";
include "../engine/log.php";
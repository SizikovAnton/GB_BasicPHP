<?php

$title = "Главная страница - страница обо мне";
$aboutMe = "Информация обо мне";
$year = 2018;

$file = file_get_contents("site.html");

$file = str_replace("{{ TITLE }}", $title, $file);
$file = str_replace("{{ ABOUT_ME }}", $aboutMe, $file);
$file = str_replace("{{ YEAR }}", $year, $file);

echo $file;
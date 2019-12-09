<?php

$menu1 = [];
$menu1[] = [
    "name" => "Главная",
    "href" => "index.php",
];
$menu1[] = [
    "name" => "Каталог",
    "href" => "?page=catalog",
    "subMenu" => [
        [
            "name" => "Подкаталог 1",
            "href" => "?page=catalog1",
        ],
        [
            "name" => "Подкаталог 2",
            "href" => "?page=catalog2",
            "subMenu" => [
                [
                    "name" => "Подкаталог 1",
                    "href" => "?page=catalog1",
                ],
                [
                    "name" => "Подкаталог 2",
                    "href" => "?page=catalog2",
                    
                ],
            ],
        ],
    ],
];
$menu1[] = [
    "name" => "О нас",
    "href" => "?page=about",
];
$menu1[] = [
    "name" => "api Test",
    "href" => "?page=apicatalog",
];
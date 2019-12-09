<?php

//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.

echo '<b>Задание 1.</b></br>';

$i = 0;

while ($i <= 100) {
    if ($i % 3 == 0) {
        echo "{$i} ";
    }
    $i++;
}

//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так

echo '</br><b>Задание 2.</b></br>';

$i = 0;

do {
    echo "{$i} - ";
    if ($i == 0) {
        echo "ноль.";
    } elseif ($i & 1) {
        echo "нечетное число.";
    } else {
        echo "четное число.";
    }
    echo "</br>";
    $i++;
} while ($i <= 10);

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:

echo '</br><b>Задание 3.</b></br>';

$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин", "Подольск", "Коломна"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Мурманская область" => ["Мурманск", "Североморск", "Мончегорск", "Апатиты"],
    "Тверская область" => ["Тверь", "Андреаполь", "Бежецк", "Кашин"],
];

function getRegions($regions)
{
    $output = "";
    foreach ($regions as $key => $value) {
        $output .= $key . ":</br>";
        foreach ($value as $city) {
            $output .= $city . ", ";
        }
        $output = mb_substr($output, 0, -2) . "</br>";
    }
    return $output;
}

echo getRegions($regions);

//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).

echo '</br><b>Задание 4.</b></br>';

include "alfavit.php";
$translateString = "Объявить массив, Индексами которого являются Буквы русского языка, а значениями – соответсТвующие латинские буквосочетания";

function translate(string $inString, array $alfavit)
{
    $output = "";

    for ($i = 0; $i < mb_strlen($inString); $i++) {
        if (isset($alfavit[mb_substr($inString, $i, 1)])) {
            $output .= $alfavit[mb_substr($inString, $i, 1)];
        } elseif (isset($alfavit[mb_strtolower(mb_substr($inString, $i, 1))])) {
            $output .= mb_strtoupper($alfavit[mb_strtolower(mb_substr($inString, $i, 1))]);
        } else {
            $output .= mb_substr($inString, $i, 1);
        }
    }

    return $output;
}

echo $translateString . "</br>";
echo translate($translateString, $alfabet) . "</br>";

//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. Можно сделать через str_replace

echo '</br><b>Задание 5.</b></br>';

function replaceSpace($inString)
{
    return $inString = str_replace(" ", "_", $inString);
}

echo replaceSpace($translateString) . "</br>";

//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать. ВАЖНОЕ

    //Решение в файле engine3/templates/menu.php
    //В файле engine3/templates/menu_array.php массив с пунктами меню.

//7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
//for (…){ // здесь пусто}

echo '</br><b>Задание 7.</b></br>';

for ($i = 0; $i <= 10; print($i++ . " ")) {
};

//8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».

echo '</br><b>Задание 8.</b></br>';

function getRegions2($regions)
{
    $output = "";
    $outputBuf = "";
    foreach ($regions as $region => $citys) {
        $outputBuf .= $region . ":</br>";
        foreach ($citys as $city) {
            if (mb_substr($city, 0, 1) == "К") {
                $outputBuf .= $city . ", ";
            }
        }
        if ($outputBuf != $region . ":</br>") {
            $output .= mb_substr($outputBuf, 0, -2) . "</br>";
        }
        $outputBuf = "";
    }
    return $output;
}

echo getRegions2($regions);

//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

echo '</br><b>Задание 9.</b></br>';

function translateMk2($inputString, $alfavit)
{
    return replaceSpace(translate($inputString, $alfavit));
}

echo translateMk2($translateString, $alfabet);

<?php
//1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
    //если $a и $b положительные, вывести их разность;
    //если $а и $b отрицательные, вывести их произведение;
    //если $а и $b разных знаков, вывести их сумму;
echo "<b>Задание 1.</b></br>";
$a = 5;
$b = 8;
if($a >= 0 && $b >= 0){
    echo "Положительные. Разность: ";
    echo ($a > $b) ? "{$a} - {$b} = " . ($a - $b) : "{$b} - {$a} = " . ($b - $a);
} else if($a < 0 && $b < 0) {
    $c = $a * $b;
    echo "Отрицательные. Произведение: {$a} * {$b} = {$c}";
} else {
    echo "Разных знаков. Сумма: {$a} + {$b} = ";
    echo $a + $b;
}

//2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15. Вторым способом можете организовать цикл через рекурсию.
echo "</br><b>Задание 2.</b></br>";
$a = 6;

//Способ 1.
echo "Способ 1: ";
if ($a <= 15 && $a >= 0) {
    switch($a) {
        case 0:
            echo "0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 1:
            echo "1 2 3 4 5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 2:
            echo "2 3 4 5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 3:
            echo "3 4 5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 4:
            echo "4 5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 5:
            echo "5 6 7 8 9 10 11 12 13 14 15";
            break;
        case 6:
            echo "6 7 8 9 10 11 12 13 14 15";
            break;
        case 7:
            echo "7 8 9 10 11 12 13 14 15";
            break;
        case 8:
            echo "8 9 10 11 12 13 14 15";
            break;
        case 9:
            echo "9 10 11 12 13 14 15";
            break;
        case 10:
            echo "10 11 12 13 14 15";
            break;
        case 11:
            echo "11 12 13 14 15";
            break;
        case 12:
            echo "12 13 14 15";
            break;
        case 13:
            echo "13 14 15";
            break;
        case 14:
            echo "14 15";
            break;
        case 15:
            echo "15";
            break;
    }
} else {
    echo "Введите число от 0 до 15";
}

//Способ 2.
echo "</br>Способ 2: ";
function printQuest2(int $a) {
    echo $a . " ";
    if($a < 15) {
        printQuest2(++$a);
    }
}
if($a <= 15 && $a >= 0) {
    printQuest2($a);
} else {
    echo "Введите число от 0 до 15";
}

//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return. Сделайте в функции деления проверку деления на ноль и возврат сообщения об ошибке.

echo "</br><b>Задание 3.</b></br>";

$c = 6;
$d = 5;

function sum($x, $y) {
    return $x + $y;
}

function minus($x, $y) {
    return $x - $y;
}

function multiplic($x, $y) {
    return $x * $y;
}

function division($x, $y) {
    return ($x != 0 && $y != 0) ? ($x / $y) : "Ошибка. Один из операндов равен нулю.";
}

echo "Сложение {$c} + {$d} = " . sum($c, $d) . "</br>";
echo "Вычетание {$c} - {$d} = " . minus($c, $d) . "</br>";
echo "Умножение {$c} * {$d} = " . multiplic($c, $d) . "</br>";
echo "Деление {$c} / {$d} = " . division($c, $d) . "</br>";

//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

echo "</br><b>Задание 4.</b></br>";

function mathOperation($arg1, $arg2, $operation) {
    switch($operation) {
        case "+":
            return sum($arg1, $arg2);
        break;
        case "-":
            return minus($arg1, $arg2);
        break;
        case "*":
            return multiplic($arg1, $arg2);
        break;
        case "/":
            return division($arg1, $arg2);
        break;
    }
}

echo "Сложение {$c} + {$d} = " . mathOperation($c, $d, "+") . "</br>";
echo "Вычетание {$c} - {$d} = " . mathOperation($c, $d, "-") . "</br>";
echo "Умножение {$c} * {$d} = " . mathOperation($c, $d, "*") . "</br>";
echo "Деление {$c} / {$d} = " . mathOperation($c, $d, "/") . "</br>";
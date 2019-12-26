<?php

function sum(int $oper1, int $oper2) {
    return $oper1 + $oper2;
}

function minus(int $oper1, int $oper2) {
    return $oper1 - $oper2;
}

function multiplic(int $oper1, int $oper2) {
    return $oper1 * $oper2;
}

function division(int $oper1, int $oper2) {
    return $oper2 != 0 ? $oper1 / $oper2 : "Деление на ноль недопустимо";
}

function mathOperation(int $oper1, int $oper2, $operation) {
    return $operation($oper1, $oper2);
}
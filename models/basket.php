<?php

//Создание новой позиции в корзине
function createBasket($goodId, $sessionId, $count = 1) {
    if(getCatalogItem($goodId)) {
        $basketTemp = getAssocResult("SELECT id FROM basket WHERE session_id = '{$sessionId}' AND good_id = $goodId");
        if(empty($basketTemp)) {
            executeQuery("INSERT INTO `basket` (`good_id`, `count`, `session_id`) VALUES ('{$goodId}', '{$count}', '{$sessionId}')");
        } else {
            addBasket($basketTemp[0]['id']);
        }
        return true;
    } else {
        return false;
    }
}

//Увеличение количества товара в позиции
function addBasket($bascketId, $count = 1) {
    executeQuery("UPDATE basket SET count = count+{$count} WHERE id = {$bascketId}");
}

//Вывод состава корзины по указанной сессии
function getBasket($sessionId) {
    return getAssocResult("SELECT goods.id goods_id, basket.id basket_id, goods.name, goods.image, goods.price, basket.count FROM basket, goods WHERE basket.good_id=goods.id AND session_id='{$sessionId}'");
}

//Функция возвращает количество позиций в корзине
function getBasketCount($sessionId) {
    $basket = getAssocResult("SELECT count FROM basket WHERE session_id = '{$sessionId}'");
    /*$count = 0;
    foreach($basket as $position) {
        $count += $position['count'];
    }*/
    return "(" . count($basket) . ")";
}

//Функция уменьшает или удаляет позицию в корзине
function deleteBasket($basketId) {
    $basketTemp = getAssocResult("SELECT count FROM basket WHERE id={$basketId}");
    if($basketTemp[0]['count'] > 1) {
        executeQuery("UPDATE basket SET count = count-1 WHERE id={$basketId}");
    } else {
        executeQuery("DELETE FROM basket WHERE basket.id = {$basketId}");
    }
    return true;
}
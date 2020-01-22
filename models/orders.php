<?php

function getOrders() {
    return getAssocResult("SELECT * FROM `orders` WHERE 1");
}

function getOrderItem($id) {
    return getAssocResult(
    "SELECT
        goods.id goods_id,
        basket.id basket_id,
        goods.name,
        goods.image,
        goods.price,
        basket.count,
        orders.id order_id,
        orders.name order_name,
        orders.adress order_adress,
        orders.telephone order_telephone,
        orders.sum order_price,
        orders.status order_status
    FROM
        basket,
        goods,
        orders
    WHERE
        orders.id = {$id} AND basket.session_id = orders.session_id AND basket.good_id = goods.id");
}

function setOrderStatus($id, $status) {
    executeQuery("UPDATE `orders` SET `status` = '{$status}' WHERE `id` = {$id}");
}

function getOrderStatus($id) {
    return getAssocResult("SELECT `status` FROM `orders` WHERE `id` = {$id}")[0]['status'];
}
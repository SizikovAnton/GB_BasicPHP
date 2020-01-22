<?php

function apiController(&$params, $action) {
    if ($action == 'addlike') {
        addLikeGood($_GET['id']);
        $likes = getGoodLikes($_GET['id']);

        echo json_encode(['likes' => $likes]);
    }

    if ($action == 'addBasket') {
        if(createBasket($_GET['id'], session_id())) {
            echo json_encode(['message' => "Товар добавлен в корзину", 'basketCount' => getBasketCount(session_id())]);
        } else {
            echo json_encode(['message' => "Ошибка"]);
        }
    }

    if ($action == 'deleteBasket') {
        echo deleteBasket($_GET['id']);
    }

    if($action == 'getBasket') {
        echo json_encode(getBasket(session_id()));
    }
    
    die();
}
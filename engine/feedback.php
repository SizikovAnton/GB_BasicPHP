<?php

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function doFeedbackAction(&$params, $action) {
    if ($action == "add") {
        var_dump("Добавим отзыв!");
        die();
    }
    if ($action == "delete") {
        var_dump("Удалим отзыв");
        die();
    }
    if ($action == "edit") {
        var_dump("Правим отзыв");
        die();
    }

    if ($_GET['message'] == 'OK') $params['message'] = "Отзыв добавлен!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
}
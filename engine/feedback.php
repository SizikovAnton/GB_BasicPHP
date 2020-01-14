<?php

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function doFeedbackAction(&$params, $action) {
    if ($action == "add" || $action == "") {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['message'])));
        $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
        executeQuery($sql);
        header("Location: /feedback/?message=OK");
    }
    if ($action == "delete") {
        $id = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_GET['id'])));
        $sql = "DELETE FROM `feedback` WHERE `feedback`.`id` = {$id}";
        executeQuery($sql);
        header("Location: /feedback/?message=delete");
    }
    if ($action == "edit") {
        if(empty($_POST['id'])) {
            $request = getAssocResult("SELECT * FROM `feedback` WHERE id = {$_GET['id']}");
            $params = $request[0];
            $params['action'] = 'edit';
        } else {
            $id = $_POST['id'];
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['message'])));
            $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id}";
            executeQuery($sql);
            header("Location: /feedback/?message=edit");
        }
    }

    if ($_GET['message'] == 'OK') $params['message'] = "Отзыв добавлен!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
    if ($_GET['message'] == 'delete') $params['message'] = "Отзыв удален!";
}
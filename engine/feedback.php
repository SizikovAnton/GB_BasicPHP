<?php

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function addFeedback($name, $feedback) {
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $name)));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $feedback)));
    $sql = "INSERT INTO `feedback` (`name`, `feedback`) VALUES ('{$name}', '{$feedback}');";
    executeQuery($sql);
    return mysqli_insert_id(getDb());
}

function deleteFeedback($id_feed) {
    $id_feed = (int)$id_feed;
    executeQuery("DELETE FROM `feedback` WHERE id = {$id_feed}");
}

function doApiFeedbackAction($action) {
    if ($action == "add") {
        $data = json_decode(file_get_contents('php://input'));

        $id = addFeedback($data->name, $data->feedback);
        $response = [
            'id' => $id,
            'name' => $data->name,
            'feedback' => $data->feedback,
        ];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }

    if ($action == "delete") {
        deleteFeedback($_GET['id']);
        echo json_encode(['response' => 1]);
        die();
    }
}

function doFeedbackAction(&$params, $action) {
    $params['name'] = '';
    $params['text'] = '';
    $params['button'] = 'Добавить';
    $params['action'] = 'add';
    $params['id_feed'] = '';

    if ($action == "add") {
        addFeedback($_POST['name'], $_POST['feedback']);
        header("Location: /feedback/?message=OK");
    }

    if ($action == "delete") {
        deleteFeedback($_GET['id_feed']);

        header("Location: /feedback/?message=delete");
    }

    if ($action == "edit") {
        $id_feed = (int)$_GET['id_feed'];
        $result_feedback = getAssocResult("SELECT * FROM `feedback` WHERE id = {$id_feed}");
        $params['name'] = $result_feedback[0]['name'];
        $params['text'] = $result_feedback[0]['feedback'];
        $params['action'] = 'save';
        $params['id_feed'] = $id_feed;
        $params['button'] = 'Править';
    }

    if ($action == "save") {
        $id_feed = (int)$_POST['id_feedback'];
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['feedback'])));
        executeQuery("UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id_feed};");
        header("Location: /feedback/?message=edit");
    }

    if ($_GET['message'] == 'OK') $params['message'] = "Отзыв добавлен!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
    if ($_GET['message'] == 'delete') $params['message'] = "Отзыв удален!";
    if ($_GET['message'] == 'edit') $params['message'] = "Отзыв изменен!";
}
<?php
function ordersController(&$params, $action) {
    if(!isAdmin()) die('Отказано в доступе!');

    if(empty($action)) $action = 'orders';

    switch($action) {
        case 'orders':
            $params['orders'] = getOrders();
            break;
        case 'item':
            $params['basket'] = getOrderItem($_GET['id']);
            break;
        case 'setStatus':
            $data = json_decode(file_get_contents('php://input'));
            echo setOrderStatus($data->id, $data->status);
            die;
        case 'getStatus':
            echo json_encode(["order_status" => getOrderStatus($_GET['id'])]);
            die;
    }

    $templateName = '/orders/' . $action;

    return render($templateName, $params);
}
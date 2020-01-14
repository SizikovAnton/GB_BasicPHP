<?php
include 'math.php';

//Парсим запрос, получаем входные данные в виде JSON массива
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$result['result'] = mathOperation($data['operand1'], $data['operand2'], $data['operation']);
echo json_encode($result);
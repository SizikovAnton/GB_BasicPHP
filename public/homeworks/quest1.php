<?php
include 'math.php';

$errors = [];
$result;

if(empty($_GET['operand1'])) {
    $errors[] = "Укажите первый операнд";
}

if(empty($_GET['operand2'])) {
    $errors[] = "Укажите второй операнд";
}

if(empty($errors)) {
    $result = mathOperation($_GET['operand1'], $_GET['operand2'], $_GET['operation']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <? foreach ($errors as $error) echo $error . '<br>'?>
    <form action="">
        <input type="text" name="operand1" value="<?= $_GET['operand1'] ?>">
        <select name="operation" id="" value="<?= $_GET['operation'] ?>">
            <option value="sum" <? if($_GET['operation'] == 'sum') echo 'selected' ?>>+</option>
            <option value="minus" <? if($_GET['operation'] == 'minus') echo 'selected' ?>>-</option>
            <option value="multiplic" <? if($_GET['operation'] == 'multiplic') echo 'selected' ?>>*</option>
            <option value="division" <? if($_GET['operation'] == 'division') echo 'selected' ?>>/</option>
        </select> 
        <input type="text" name="operand2" value="<?= $_GET['operand2'] ?>">
        <button type="submit">=</button>
        <input type="text" name="result" value="<?= $result ?>">
    </form>
</body>
</html>
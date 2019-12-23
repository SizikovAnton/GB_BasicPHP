<?php 
include 'math.php';

$errors = [];
$result;

if(empty($_POST['operand1'])) {
    $errors[] = "Укажите первый операнд";
}

if(empty($_POST['operand2'])) {
    $errors[] = "Укажите второй операнд";
}

if(empty($errors)) {
    $result = mathOperation($_POST['operand1'], $_POST['operand2'], $_POST['operation']);
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

    <form action="" method="post">
        <input type="text" name="operand1" value="<?= $_POST['operand1'] ?>">

        <button type="submit" name="operation" value="sum">+</button>
        <button type="submit" name="operation" value="minus">-</button>
        <button type="submit" name="operation" value="multiplic">*</button>
        <button type="submit" name="operation" value="division">/</button>

        <input type="text" name="operand2" value="<?= $_POST['operand2'] ?>">
        
        <label for="result">=</label>
        <input type="text" name="result" value="<?= $result ?>">
    </form>
</body>
</html>
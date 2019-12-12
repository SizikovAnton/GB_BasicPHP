<?php
require_once "classSimpleImage.php";

if (isset($_POST['load'])) {
    $path = "gallery_img/big/" . $_FILES["image"]["name"];
    $path_small = "gallery_img/small/" . $_FILES["image"]["name"];
    
    if (checkFormat(substr($_FILES["image"]["name"] ,strripos($_FILES["image"]["name"], ".") + 1)) && $_FILES["image"]["size"] <= 10485760) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
            $image = new SimpleImage();
            $image->load($path);
            $image->resizeToHeight(100);
            $image->save($path_small);
            
            header("Location: index.php");
        } else {
            echo "Ошибка";
        }
    } else {
        echo "Неверный формат изображения или размер превышает 10 МБ</br>";
        echo "Формат: " . substr($_FILES["image"]["name"] ,strripos($_FILES["image"]["name"], ".") + 1) . "</br>";
        echo "Размер: " . $_FILES["image"]["size"] . " байт";
    }

    //Второй способ проверки.

    /*if (strpos($_FILES["image"]["type"], "image") === 0 && $_FILES["image"]["size"] <= 10485760) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
            $image = new SimpleImage();
            $image->load($path);
            $image->resizeToHeight(100);
            $image->save($path_small);
            
            header("Location: index.php");

            echo "ЗБС!";
        } else {
            echo "Ошибка";
        }
    } else {
        echo "Неверный формат изображения или размер превышает 10 МБ</br>";
        echo "Формат: " . substr($_FILES["image"]["type"] ,strripos($_FILES["image"]["type"], "/") + 1) . "</br>";
        echo "Размер: " . $_FILES["image"]["size"] . " байт";
    }*/

}

function checkFormat($name) {
    $formats = ["jpg", "jpeg", "png"];
    foreach($formats as $format) {
        if($name === $format) {
            return true;
        }
    }
    return false;
}
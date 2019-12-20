<?php

include dirname(dirname(__DIR__)) . "/config/config.php";

function setupGallery(string $path) {

    executeQuery("CREATE TABLE `gallery` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(65) NOT NULL , `views` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = InnoDB");
    
    //$db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
    $sql = "INSERT INTO gallery (name) VALUES ";
    $source = array_splice(scandir("{$path}/small/"), 2);

    foreach ($source as $item) {
        $sql .= "('{$item}'),";
    }

    $sql = substr($sql, 0, -1);

    return executeQuery($sql);
    
}

setupGallery(dirname(__DIR__) . '/upload/gallery');
<?php
require_once(ENGINE . "classSimpleImage.php");

if (isset($_POST['load'])) {
    $path = "upload/gallery/big/" . $_FILES["image"]["name"];
    $path_small = "upload/gallery/small/" . $_FILES["image"]["name"];

    if (strpos($_FILES["image"]["type"], "image") === 0 && $_FILES["image"]["size"] <= 10485760) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
            $image = new SimpleImage();
            $image->load($path);
            $image->resizeToHeight(100);
            $image->save($path_small);

            header("Location: /?page=gallery");
        } else {
            echo "Ошибка";
        }
    } else {
        echo "Неверный формат изображения или размер превышает 10 МБ</br>";
        echo "Формат: " . substr($_FILES["image"]["type"] ,strripos($_FILES["image"]["type"], "/") + 1) . "</br>";
        echo "Размер: " . $_FILES["image"]["size"] . " байт";
    }
}

?>

<div class="gallery">
    <? foreach($images as $image): ?>
        <a href="<?="{$galleryPath}/big/{$image}"?>" class="photo" target="_blank"><img src="<?="{$galleryPath}/small/{$image}"?>" width="150" height="100"/></a>
    <? endforeach; ?>
</div>
<div class="upload">
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" value="Загрузить" name="load">	
	</form>
</div>
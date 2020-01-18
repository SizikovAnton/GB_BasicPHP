<h2>  Отзывы  </h2>

<?=$message?>

<form action="/feedback/<?=$action?>/" method="post">
    Оставьте отзыв: <br>
    <input hidden type="text" name="id_feedback" value="<?=$id_feed?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="feedback" placeholder="Ваш отзыв" value="<?=$text?>"><br>
    <input type="submit" value="<?=$button?>">
</form>

<?foreach ($feedback as $value): ?>

    <div style="margin-top: 10px"><strong><?=$value['name']?></strong>: <?=$value['feedback']?>
        <a href="/feedback/edit/?id_feed=<?=$value['id']?>">[править]</a>
        <a href="/feedback/delete/?id_feed=<?=$value['id']?>">[X]</a>
    </div>

<?endforeach;?>
<h2>  Отзывы  </h2>

<?=$message?>

<form action="/feedback/<?= $action ?>/" method="post">
    Оставьте отзыв: <br>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="name" placeholder="Ваше имя" value="<?= $name ?>"><br>
    <input type="text" name="message" placeholder="Ваш отзыв" value="<?= $feedback ?>"><br>
    <input type="submit" > 
</form>

<?foreach ($allFeedback as $value): ?>

    <div>
        <strong><?=$value['name']?></strong>: <?=$value['feedback']?>
        <a href="edit/?id=<?=$value['id']?>">[править]</a>
        <a href="delete/?id=<?=$value['id']?>">[удалить]</a>
    </div>

<?endforeach;?>
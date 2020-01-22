<h2>Каталог товаров:</h2>

<?php foreach ($catalog as $value):?>
<div>
    Like: <span id="like<?=$value["id"]?>"><?=$value["likes"]?></span>
    <a href="/catalog/item/?id=<?=$value["id"]?>">
    <h2><?=$value["name"]?></h2>
    <img src="/images/catalog/<?=$value["image"]?>" alt="" width="150"><br>
    Стоимость: <?=$value["price"]?><br></a>
    <button class="like" data-id="<?=$value["id"]?>">like</button><br>
    <button class="addBasket" data-id="<?= $value["id"] ?>">Купить</button>
    <p id="status<?=$value["id"]?>"></p>
    <hr>
</div>
<? endforeach;?>

<script>
    let buttonslike = document.querySelectorAll('.like');
    buttonslike.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/api/addlike/?id=' + id);
                const answer = await response.json();
                document.getElementById('like' + id).innerText = answer.likes;
                //console.log(answer.likes);
            })();
        });
    });

    let buttonsBuy = document.querySelectorAll('.addBasket');
    buttonsBuy.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/api/addBasket/?id=' + id);
                const answer = await response.json();

                document.getElementById('status' + id).innerText = answer.message;
                if(answer.basketCount) {
                    document.getElementById('basketCount').innerText = answer.basketCount;
                }
                

                //document.getElementById('like' + id).innerText = answer.likes;
                //console.log(answer.likes);
            })();
        });
    });
</script>

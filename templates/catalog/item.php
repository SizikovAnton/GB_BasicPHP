<h2><?=$value["name"]?></h2>
<img src="/images/catalog/<?=$value["image"]?>" alt="" width="250"><br>
<?=$value["description"]?><br>
Стоимость: <?=$value["price"]?><br>
<button onclick="buttonBuy(<?= $value["id"] ?>)">Купить</button><hr>
<p id="status<?=$value["id"]?>"></p>

<script>

async function buttonBuy (id) {
    const response = await fetch('/api/addBasket/?id=' + id);
    const answer = await response.json();

    document.getElementById('status' + id).innerText = answer.message;
    if(answer.basketCount) {
        document.getElementById('basketCount').innerText = answer.basketCount;
    }
}


</script>
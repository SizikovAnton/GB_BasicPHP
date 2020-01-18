<h2> Отзывы </h2>

<div id="message"></div>

<div>
    Оставьте отзыв: <br>
    <input type="text" id="name" placeholder="Ваше имя" value="<?= $name ?>"><br>
    <input type="text" id="feedback" placeholder="Ваш отзыв" value="<?= $text ?>"><br>
    <button id="add" type="button">Добавить</button>
</div>

<? foreach ($feedback as $value): ?>
    <div id="feed">
        <div id="<?= $value['id'] ?>" style="margin-top: 10px">
            <strong><?= $value['name'] ?></strong>: <?= $value['feedback'] ?>
            <button type="button">[править]</a></button>
            <button class="delete" data-id="<?= $value['id'] ?>" type="button">[X]</a></button>
        </div>
    </div>
<? endforeach; ?>

<script>

    document.getElementById('add').onclick = function () {
        (async () => {
            let name = document.getElementById('name').value;
            let feedback = document.getElementById('feedback').value;
            const response = await fetch('/feedbackapi/add/', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    name: name,
                    feedback: feedback
                }), // body data type must match "Content-Type" header
            });
            const answer = await response.json();
            document.getElementById('name').value = '';
            document.getElementById('feedback').value = '';


            $("#feed").prepend("<div  id='" + answer.id + "' style='margin-top: 10px'><strong>" + answer.name + "</strong>: " + answer.feedback + " <button type='button'> [править] </a></button> <button id='del" + answer.id + "' class='delete' data-id='" + answer.id + "' type='button'>[X]</a></button></div>");
            let elem = document.getElementById('del' + answer.id);
            detele(elem);
        })();
    };

    function detele(elem) {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/feedbackapi/delete/?id=' + id);
                    await response.json();
                    document.getElementById(id).remove();
                }
            )();
        })
    }


    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        detele(elem);
    })


</script>

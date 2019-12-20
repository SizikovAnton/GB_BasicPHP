<h2>Галерея</h2>

<?php foreach ($gallery as $image): ?>
    <a href="/gallery/<?= $image['id'] ?>"><img src="/upload/gallery/small/<?= $image['name'] ?>" height="100"></a>
<? endforeach ?>
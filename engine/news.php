<?php
function getNews()
{
    return getAssocResult("SELECT * FROM news");
}

function getOneNews(int $id) {
    $sql = "SELECT text FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);
    return $news[0]['text'];
}
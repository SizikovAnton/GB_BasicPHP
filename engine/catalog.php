<?php
function getCatalog() {
    return getAssocResult("SELECT * FROM `goods`");
}
function getCatalogItem($id) {
    $id = (int)$id;
    return getAssocResult("SELECT * FROM `goods` WHERE id = {$id}")[0];
}

function addLikeGood($id) {
    $id = (int)$id;
    executeQuery("UPDATE `goods` SET likes=likes + 1 WHERE id={$id}");
}
function getGoodLikes($id) {
    $id = (int)$id;
    return getAssocResult("SELECT likes FROM `goods` WHERE id={$id}")[0]['likes'];
}
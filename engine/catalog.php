<?php
function doCatalogAction(&$params, $action) { 

}

function createCatalogItem($itemParams) {
    /*$sql = "INSERT INTO `catalog` (`name`, `description`, `image`, `price`) VALUES ({$itemParams['name']}, {$itemParams['description']}, {$itemParams['image']}, {$itemParams['price']})";
    executeQuery($sql);
    return true;*/
}

function readCatalogItem($id) {
    return getAssocResult("SELECT * FROM `catalog` WHERE id = {$id}")[0];

}

function readCatalog() {
    $sql = "SELECT * FROM `catalog` ORDER BY id ASC";
    return getAssocResult($sql);
}

function updateCatalogItem() {

}

function deleteCatalogItem($id) {
    /*$sql = "DELETE FROM `catalog` WHERE `catalog`.`id` = {$id}";
    executeQuery($sql);
    return true;*/
}
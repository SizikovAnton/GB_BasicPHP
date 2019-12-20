<?php

function getGallery () {
    return getAssocResult('SELECT * FROM gallery ORDER BY views DESC');
}

function getImageGallery ($id) {
    executeQuery("UPDATE gallery SET views = views+1 WHERE id = {$id}");
    return getAssocResult("SELECT * FROM gallery WHERE id = {$id}");
}
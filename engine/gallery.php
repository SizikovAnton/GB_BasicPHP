<?php
function getGallery (string $path) {
    $source = array_splice(scandir("{$path}/small/"), 2);
    return $source;
}
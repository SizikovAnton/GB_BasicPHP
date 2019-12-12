<?php
function getGallery (string $path) {
    $output = "<div class=\"gallery\">";

    $source = array_splice(scandir("{$path}/small/"), 2);
    
    foreach ($source as $file)
    {
        $output .= "<a rel=\"gallery\" class=\"photo\" href=\"{$path}/big/{$file}\"><img src=\"{$path}/small/{$file}\" width=\"150\" height=\"100\" /></a>";
    }

    return ($output . "</dib>");
}

//echo getGallery("gallery_img");

include (dirname(__DIR__) . "/gallery/mygallery.php");
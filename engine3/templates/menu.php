<?php
include "menu_array.php";

function getMenu($menuArray)
{
    $output = "";
    $output .= "<ul>";
    foreach ($menuArray as $item) {
        $output .= "<li><a href=\"{$item["href"]}\">{$item["name"]}</a>";
        if (isset($item["subMenu"])) {
            $output .= getMenu($item["subMenu"]);
        }
        $output .= "</li>";
    }
    $output .= "</ul>";
    return $output;
}

echo getMenu($menu1);

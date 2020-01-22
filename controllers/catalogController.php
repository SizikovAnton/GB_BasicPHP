<?php

function catalogController(&$params, $action) {
    if(empty($action)) $action = 'catalog';
    
    switch($action) {
        case 'catalog':
            $params['catalog'] = getCatalog();
        break;
        case 'item':
            $params['value'] = getCatalogItem($_GET['id']);
        break;
    }

    $templateName = '/catalog/' . $action;
    
    return render($templateName, $params);
}
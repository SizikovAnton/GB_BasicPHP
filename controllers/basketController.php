<?php

function basketController(&$params, $action) {
    if(empty($action)) $action = 'basket';

    $templateName = 'basket';
    
    return render($templateName, $params);
}
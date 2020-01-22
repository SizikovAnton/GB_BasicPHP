<?php

function checkoutController(&$params, $action) {
    if(empty($action)) $action = 'checkout';
    
    $params['baskets'] = getBasket(session_id());

    $templateName = 'checkout';
    
    return render($templateName, $params);
}
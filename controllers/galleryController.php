<?php

function galleryController(&$params, $action) {
    if(empty($action)) $action = 'gallery';
    
    switch($action) {
        case 'gallery':
            if (isset($_POST['load'])) {
                loadImage();
            }
        
            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery(IMG_BIG);
        break;
        case 'item':
            $params['layout'] = 'gallery';
            if (addLikes($_GET['id'])) {
                $params['message'] = "Такого изображения нет в БД";
            };
            $params['image'] = getOneImage($_GET['id']);
        break;
    }

    $templateName = '/gallery/' . $action;
    
    return render($templateName, $params);
}
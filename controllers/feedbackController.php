<?php

function feedbackController(&$params, $action) {
    if(!empty($action)) {
        doApiFeedbackAction($action);
    }

    $params['feedback'] = getAllFeedback();

    $templateName = 'feedback';
    
    return render($templateName, $params);
}
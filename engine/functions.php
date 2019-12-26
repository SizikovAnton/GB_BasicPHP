<?php
//Файл с функциями нашего движка


/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action)
{

    $params = [];

    switch ($page) {
        case 'feedback':
            doFeedbackAction($params, $action);

            $params['feedback'] = getAllFeedback();
            break;

        case 'index':
            $params['name'] = 'Вася';
            break;
        case 'news':

            $params['news'] = getNews();

            break;
        case 'newspage':

            $params['text'] = getOneNews($_GET['id']);

            break;
        case 'catalog':
            $params['catalog'] = [
                [
                    'name' => 'Пицца',
                    'price' => 24
                ],
                [
                    'name' => 'Чай',
                    'price' => 1
                ],
                [
                    'name' => 'Яблоко',
                    'price' => 12
                ],
            ];
            break;
        case 'apicatalog':
            $params['catalog'] = [
                [
                    'name' => 'Пицца',
                    'price' => 24
                ],
                [
                    'name' => 'Чай',
                    'price' => 1
                ],
                [
                    'name' => 'Яблоко',
                    'price' => 12
                ],
            ];
            echo json_encode($params, JSON_UNESCAPED_UNICODE);
            exit;
    }
    return $params;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'layout', [
        'content' => renderTemplate($page, $params),
        'menu' => renderTemplate('menu')
    ]);
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы {$page} не существует.");
    }

    return ob_get_clean();
}

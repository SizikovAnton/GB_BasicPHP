<?php
//Файл с функциями нашего движка

function prepareVariables($page, $action)
{
    $params['layout'] = 'layout';
    switch ($page) {
        case 'catalogApi':
            //TODO Перенести контроллер в отдельный файл
            if ($action == 'addlike') {
                addLikeGood($_GET['id']);
                $likes = getGoodLikes($_GET['id']);

                echo json_encode(['likes' => $likes]);
            }

            if ($action == 'addBasket') {
                if(createBasket($_GET['id'], session_id())) {
                    echo json_encode(['message' => "Товар добавлен в корзину", 'basketCount' => getBasketCount(session_id())]);
                } else {
                    echo json_encode(['message' => "Ошибка"]);
                }
            }

            if ($action == 'deleteBasket') {
                echo deleteBasket($_GET['id']);
            }

            if($action == 'getBasket') {
                echo json_encode(getBasket(session_id()));
            }
            
            die();
            break;

        case 'checkout':
            $params['baskets'] = getBasket(session_id());
            break;

        case 'feedbackapi':
            doApiFeedbackAction($action);

            break;
        case 'feedback2':

            $params['feedback'] = getAllFeedback();
            break;
        case 'feedback':
            doFeedbackAction($params, $action);

            $params['feedback'] = getAllFeedback();
            break;

        case 'index':
            $params['name'] = 'Вася';
            break;
        case 'image':
            $params['layout'] = 'gallery';
            if (addLikes($_GET['id'])) {
                $params['message'] = "Такого изображения нет в БД";
            };
            $params['image'] = getOneImage($_GET['id']);
            break;
        case 'gallery':

            if (isset($_POST['load'])) {
                loadImage();
            }

            $params['layout'] = 'gallery';
            $params['gallery'] = getGallery(IMG_BIG);

            break;

        case 'catalog':
            $params['catalog'] = getCatalog();
            break;

        case 'item':
            $params['value'] = getCatalogItem($_GET["id"]);
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
function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
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

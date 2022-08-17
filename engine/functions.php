<?php

function render($page, $params = [], $layout = 'main' )
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
        'title' => $params['title'],
        'images' => $params['images'] ?? '',
        'message' => $params['message'] ?? '',
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}


function renderTemplate($page, $params = [])
{
    // foreach ($params as $key => $value) {
    //     $$key = $value;
    // }

    extract($params);

    ob_start();
    include TEMLATES_DIR . $page . ".php";
    return ob_get_clean();
}
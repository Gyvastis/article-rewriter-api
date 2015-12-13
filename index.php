<?php

require_once 'vendor/autoload.php';

$app = new Slim\App();

$app->post('/rewrite', function(\Slim\Http\Request $request, \Slim\Http\Response $response){
    $response_params = [
        'success' => false,
        'message' => '',
        'data' => []
    ];

    if( ! $request->getContentType() == 'application/json'){
        $response_params['message'] = "Request Content-Type must be 'application/json'";
    }
    else{
        $request_params = $request->getParsedBody();

        if(empty($request_params)){
            $response_params['message'] = "Request params missing";
        }
        else if( ! isset($request_params['text']) OR empty($request_params['text'])){
            $response_params['message'] = "Request params 'text' is empty or missing";
        }
        else{
            $request_text = $request_params['text'];
            $request_text = preg_replace('/[^0-9a-z-\.,\?!\(\)\s\n\r]/i', '', $request_text);
            $response_params['data'] = $request_text;
        }
    }

    return $response->withJson($response_params);
});

$app->post('/test', function(\Slim\Http\Request $request, \Slim\Http\Response $response){
    $spun_article = spin_article('My pleasure Kim. Please spread the word about the list through the independent bookstores. I know that many of the independent bookstores have blogs or websites. Thank you for your reviews of Indie books. I love you very much. I am fine.');
});

$app->run();
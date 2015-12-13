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
//            $request_text = preg_replace('/[^0-9a-z-\.,\?!\(\)\s\n\r]/i', '', $request_text);
            $request_include_capitalized = isset($response_params['include_capitalized']) ? $response_params['include_capitalized'] : false;
            $rewritten_text = spin_article($request_text, $request_include_capitalized);

            if( ! $rewritten_text){
                $response_params['message'] = 'Rewriting failed';
            }
            else{
                $response_params['success'] = true;
                $response_params['message'] = 'Text rewritten successfully';
                $response_params['data']['rewritten_text'] = $rewritten_text;
            }
        }
    }

    return $response->withJson($response_params);
});

$app->run();
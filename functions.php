<?php

function spin_article($text_to_spin, $include_capitalized = false){

    $client = new \Goutte\Client();
    $spinner_url = 'http://paraphrasing-tool.com/';

    $crawler = $client->request('GET', $spinner_url);

    $math_captcha_equation = $crawler->filter('#math_captcha_equation')->first()->attr('value');
    $math_captcha_equation = str_replace([
        'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'
    ], [
        0,      1,      2,      3,      4,      5,      6,      7,      8,      9,      10
    ], $math_captcha_equation);
    $math_captcha_equation = explode(' ', $math_captcha_equation);

    $math_captcha_result = null;
    switch($math_captcha_equation[1]){
        case '+':
            $math_captcha_result = $math_captcha_equation[0] + $math_captcha_equation[2];
            break;
        case '-':
            $math_captcha_result = $math_captcha_equation[0] - $math_captcha_equation[2];
            break;
    }

    if(is_null($math_captcha_result)){
        return false;
    }

    $crawler = $client->submit($crawler->selectButton('Go!')->form(), [
        'math_captcha_answer' => $math_captcha_result,
        'formNameLabelTextBefore' => $text_to_spin,
        'formNameLabelSpinCapWords' => $include_capitalized
    ]);

    return $crawler->filter('#formNameLabelTextAfter')->first()->text();

}
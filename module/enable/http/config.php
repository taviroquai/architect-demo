<?php

r('/demo/http', function() {
    
    $get_result = help()->createCurl(u('/demo/http/get'))->execute();
    $post_result = help()->createCurl(
        u('/demo/http/post'),
        array('param' => 'post')
    )->execute();
    
    $layout = l(__DIR__.'/theme/template.php');
    $layout->set('http_get_url', u('/demo/http/get'));
    $layout->set('http_post_url', u('/demo/http/post'));
    $layout->set('get_result', $get_result);
    $layout->set('post_result', $post_result);
    c($layout);
});

r('/demo/http/get', function() {
    o('test');
});

r('/demo/http/post', function() {
    o(i('param'));
});
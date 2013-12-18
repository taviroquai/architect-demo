<?php

r('/demo/http', function() {
    
    $curl_get = help()->createCurl(u('/demo/http/get'));
    $curl_post = help()->createCurl(
        u('/demo/http/post'),
        array('param' => 'post')
    );
    $get_result = $curl_get->run();
    $post_result = $curl_post->run();
    $curl_get->closeConnection();
    $curl_post->closeConnection();
    
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
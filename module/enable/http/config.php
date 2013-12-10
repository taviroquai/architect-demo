<?php

r('/demo/http', function() {
    
    $get_result = help()->httpGet(u('/demo/http/get'));
    $post_result = help()->httpPost(
        help()->url('/demo/http/post'),
        array('param' => 'post')
    );
    
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
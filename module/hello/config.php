<?php

r('/hello', function() {
    $message = '<h1>Hello World!<h1>';
    c($message);
});
<?php

// Default social page
r('/demo/social', function() {
    $layout = l(__DIR__.'/theme/template.php');
    $layout->set('twitter_url',  u('/demo/social/connect/twitter'));
    $layout->set('facebook_url', u('/demo/social/connect/facebook'));
    $layout->set('google_url',   u('/demo/social/connect/google'));
    c($layout);
    m('Dont forget to put client keys at /module/enable/social/lib/Social.php');
});

// Display Twitter profile
r('/demo/social/twitter', function() {
    
    $helper = \Demo\Social::factory('twitter');
    if (!$helper->isValid()) {
        m('Login with Twitter first', 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    
    // Display Twitter profile
    $profile = $helper->getProfile();
    $layout = l(__DIR__.'/theme/user.php');
    $layout->set('name', $profile['name']);
    $layout->set('img_url', $profile['profile_image_url']);
    $layout->set('logout_url', u('/logout'));
    c($layout);
});

// Display Facebook profile
r('/demo/social/facebook', function() {
    
    $helper = \Demo\Social::factory('facebook');
    if (!$helper->isValid()) {
        m('Login with Facebook first', 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    
    if (!$profile = $helper->getProfile()) {
        m('Could not get Facebook profile', 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    $api = $helper->getApi();
    
    // Display Facebook profile
    $layout = l(__DIR__.'/theme/user.php');
    $layout->set('name', $profile->name);
    $layout->set('img_url', "https://graph.facebook.com/{$profile->id}/picture");
    $layout->set('logout_url', $api->getLogoutUrl(array('next' => u('/logout'))));
    c($layout);
});

// Display Google profile
r('/demo/social/google', function() {
    
    $helper = \Demo\Social::factory('google');
    if (!$helper->isValid()) {
        m('Login with Google first', 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    
    if (i('logout')) {
        $helper->logout(u('/demo/social'));
    }
    
    try {
        $profile = $helper->getProfile();
    } catch (\Google_ServiceException $e) {
        m('Google error: '.$e->getMessage(), 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    
    // Display Google Plus profile
    $layout = l(__DIR__.'/theme/user.php');
    $layout->set('name', $profile['displayName']);
    $layout->set('img_url', $profile['image']['url']);
    $layout->set('logout_url', u('/demo/social/google', array('logout' => 1)));
    c($layout);
});

// Connect to social network; endpoint for all clients workflow
r('/demo/social/connect/(:any)', function($client) {
    
    if (!in_array($client, array('twitter', 'facebook', 'google'))) {
        m('Invalid social client: '.$client, 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
    
    $helper = \Demo\Social::factory($client);
    if ($helper->isValid()) {
        help()->redirect(u('/demo/social/'.$client));
    }
    
    if ($helper->connect(u('/demo/social/connect/'.$client))) {
        help()->redirect(u('/demo/social/'.$client));
    } else {
        m('Could not connect to '.$client, 'alert alert-error');
        help()->redirect(u('/demo/social'));
    }
});

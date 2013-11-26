<?php

// include helpers
require_once __DIR__.'/lib/Social.php';
require_once __DIR__.'/lib/Twitter.php';
require_once __DIR__.'/lib/Facebook.php';
require_once __DIR__.'/lib/Google.php';

// Default social page
r('/demo/social', function() {
    $v = app()->createView(__DIR__.'/theme/template.php');
    $v->set('twitter_url',  u('/demo/social/connect/twitter'));
    $v->set('facebook_url', u('/demo/social/connect/facebook'));
    $v->set('google_url',   u('/demo/social/connect/google'));
    c($v);
    m('Dont forget to put client keys at /module/enable/social/lib/Social.php');
});

// Display Twitter profile
r('/demo/social/twitter', function() {
    
    $helper = \Social::factory('twitter');
    if (!$helper->isValid()) {
        m('Login with Twitter first', 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    
    // Display Twitter profile
    $profile = $helper->getProfile();
    $v = app()->createView(__DIR__.'/theme/user.php');
    $v->set('name', $profile['name']);
    $v->set('img_url', $profile['profile_image_url']);
    $v->set('logout_url', u('/logout'));
    c($v);
});

// Display Facebook profile
r('/demo/social/facebook', function() {
    
    $helper = \Social::factory('facebook');
    if (!$helper->isValid()) {
        m('Login with Facebook first', 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    
    if (!$profile = $helper->getProfile()) {
        m('Could not get Facebook profile', 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    $api = $helper->getApi();
    
    // Display Facebook profile
    $v = app()->createView(__DIR__.'/theme/user.php');
    $v->set('name', $profile->name);
    $v->set('img_url', "https://graph.facebook.com/{$profile->id}/picture");
    $v->set('logout_url', $api->getLogoutUrl(array('next' => u('/logout'))));
    c($v);
});

// Display Google profile
r('/demo/social/google', function() {
    
    $helper = \Social::factory('google');
    if (!$helper->isValid()) {
        m('Login with Google first', 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    
    if (app()->input->get('logout')) {
        $helper->logout(u('/demo/social'));
    }
    
    try {
        $profile = $helper->getProfile();
    } catch (Google_ServiceException $e) {
        m('Google error: '.$e->getMessage(), 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    
    // Display Google Plus profile
    $v = app()->createView(__DIR__.'/theme/user.php');
    $v->set('name', $profile['displayName']);
    $v->set('img_url', $profile['image']['url']);
    $v->set('logout_url', u('/demo/social/google', array('logout' => 1)));
    c($v);
});

// Connect to social network; endpoint for all clients workflow
r('/demo/social/connect/(:any)', function($client) {
    
    if (!in_array($client, array('twitter', 'facebook', 'google'))) {
        m('Invalid social client: '.$client, 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
    
    $helper = \Social::factory($client);
    if ($helper->isValid()) {
        app()->redirect(u('/demo/social/'.$client));
    }
    
    if ($helper->connect(u('/demo/social/connect/'.$client))) {
        app()->redirect(u('/demo/social/'.$client));
    } else {
        m('Could not connect to '.$client, 'alert alert-error');
        app()->redirect(u('/demo/social'));
    }
});
<?php

/**
 * Description of Twitter client helper
 *
 * @author mafonso
 */
require_once __DIR__.'/twitter/twitteroauth.php';

class Twitter extends \Social {
    
    public function __construct($id, $secret, \Arch\Session $session)
    {
        parent::__construct($id, $secret, $session);
    }

    public function isValid()
    {
        return $this->session->get('twtoken') ? true : false;
    }

    public function connect($redirect_uri)
    {
        if (app()->input->get('oauth_verifier')) {
            $verifier = app()->input->get('oauth_verifier');
            $connection = new TwitterOAuth(
                $this->id,
                $this->secret,
                $this->session->get('oauth_token'),
                $this->session->get('oauth_token_secret')
            );
            $access_token = $connection->getAccessToken($verifier);
            $this->session->set('twtoken', $access_token);
            $this->session->delete('oauth_token');
            $this->session->delete('oauth_token_secret');

            if ($connection->http_code == 200) {
                return true;
            }
        } else {
            $connection = new TwitterOAuth($this->id, $this->secret);
            $request_token = $connection->getRequestToken($redirect_uri);
            $this->session->set('oauth_token', $request_token['oauth_token']);
            $this->session->set('oauth_token_secret', $request_token['oauth_token_secret']);
            $token = $this->session->get('oauth_token');

            if ($connection->http_code == 200) {
                $url = $connection->getAuthorizeURL($token, FALSE);
                app()->redirect($url); 
            }
        }
        return false;
    }
    
    public function getApi()
    {
        if (!$this->isValid()) {
            return null;
        }
        
        $access_token = $this->session->get('twtoken');
        $api = new TwitterOAuth(
            $this->id,
            $this->secret,
            $access_token['oauth_token'],
            $access_token['oauth_token_secret']
        );
        return $api;
    }
    
    public function getProfile()
    {
        $access_token = $this->session->get('twtoken');
        $api = new TwitterOAuth(
            $this->id,
            $this->secret,
            $access_token['oauth_token'],
            $access_token['oauth_token_secret']
        );
        return (array) $api->get('account/verify_credentials');
    }
    
    public function logout($redirect_uri) {
        ;
    }
}

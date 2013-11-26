<?php

/**
 * Description of Google client helper
 *
 * @author mafonso
 */
require_once __DIR__.'/google/Google_Client.php';
require_once __DIR__.'/google/contrib/Google_PlusService.php';

class Google extends \Social {
    
    public function __construct($id, $secret, \Arch\Session $session)
    {
        parent::__construct($id, $secret, $session);
    }
    
    public function isValid()
    {
        return $this->session->gtoken ? true : false;
    }
    
    public function connect($redirect_uri)
    {
        $client = new Google_Client();
        //$client->setApplicationName(G_APP_NAME);
        $client->setClientId($this->id);
        $client->setClientSecret($this->secret);
        $client->setRedirectUri($redirect_uri);
        $client->setScopes(array('openid', 'profile', 'https://www.googleapis.com/auth/plus.me'));

        if ($this->session->gtoken) {
            app()->redirect(u('/demo/social/google'));
        }

        if (app()->input->get('code')) {
            if (strval($this->session->gstate) !== strval(app()->input->get('state'))) {
                return false;
            }
            $client->authenticate(app()->input->get('code'));
            app()->session->gtoken = $client->getAccessToken();
            return true;
        } else {
            $state = mt_rand();
            $client->setState($state);
            app()->session->gstate = $state;
            app()->redirect($client->createAuthUrl());
        }
        return false;
    }
    
    public function getApi()
    {
        $client = new Google_Client();
        //$client->setApplicationName(G_APP_NAME);
        $client->setClientId($this->id);
        $client->setClientSecret($this->secret);
        $client->setAccessToken($this->session->gtoken);
        return new Google_PlusService($client);
    }
    
    public function getProfile()
    {
        $client = new Google_Client();
        //$client->setApplicationName(G_APP_NAME);
        $client->setClientId($this->id);
        $client->setClientSecret($this->secret);
        $client->setAccessToken($this->session->gtoken);

        $plus = new Google_PlusService($client);
        $profile = $plus->people->get('me');
        $this->session->gtoken = $client->getAccessToken();
        return $profile;
    }
    
    public function logout($redirect_uri)
    {
        $client = new Google_Client();
        //$client->setApplicationName(G_APP_NAME);
        $client->setClientId($this->id);
        $client->setClientSecret($this->secret);
        $client->setAccessToken($this->session->gtoken);
        $gtoken = json_decode($this->session->gtoken);
        $client->revokeToken($gtoken->access_token);
        $this->session->gtoken = false;
        app()->redirect($redirect_uri);
    }
}

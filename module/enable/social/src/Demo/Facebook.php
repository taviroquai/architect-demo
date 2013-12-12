<?php
namespace Demo;

/**
 * Description of Facebook client helper
 *
 * @author mafonso
 */
require_once __DIR__.'/../../vendor/facebook/Facebook_oauth.php';

class Facebook extends \Demo\Social {
    
    public function __construct($id, $secret, \Arch\Registry\ISession $session)
    {
        parent::__construct($id, $secret, $session);
    }
    
    public function isValid()
    {
        return $this->session->get('fbtoken') ? true : false;
    }
    
    public function connect($redirect_uri)
    {
        $api = new \Facebook_oauth(array(
            'client_id'     => $this->id,
            'client_secret' => $this->secret,
            'callback_url'  => $redirect_uri,
            'access_token'  => NULL
        ));

        if (i('code')) {
            $fbtoken = $api->getAccessToken(i('code'));
            if (!empty($fbtoken)) {
                $this->session->set('fbtoken', $fbtoken);
                return true;
            }
        } else {
            redirect($api->getAuthorizeUrl());
        }
        return false;
    }
    
    public function getApi()
    {
        if (!$this->isValid()) {
            return null;
        }
        
        $api = new \Facebook_oauth(array(
            'client_id'     => $this->id,
            'client_secret' => $this->secret,
            'access_token'  => $this->session->get('fbtoken')
        ));
        return $api;
    }
    
    public function getProfile()
    {
        $fb = new \Facebook_oauth(array(
            'client_id'     => $this->id,
            'client_secret' => $this->secret,
            'access_token'  => $this->session->get('fbtoken')
        ));
        $profile = $fb->get('/me');
        if (!empty($profile->error)) {
            m('Facebook error: '.$profile->error->message);
            redirect(u('/demo/social'));
        }
        return $profile;
    }
    
    public function logout($redirect_uri) {
        $this->session->reset();
        redirect($redirect_uri);
    }
}

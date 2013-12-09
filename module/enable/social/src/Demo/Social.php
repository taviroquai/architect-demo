<?php
namespace Demo;

/**
 * Description of Social helper
 * It uses \Arch\Session to store persistent tokens
 * @author mafonso
 */
abstract class Social
{
    /**
     * API ID / KEY
     * @var string
     */
    protected $id;
    
    /**
     * Application API SECRET
     * @var string
     */
    protected $secret;
    
    /**
     * Persistent storage
     * @var \Arch\Session
     */
    protected $session;
    
    /**
     * Returns a new Social Helper
     * @param string $id
     * @param string $secret
     * @param \Arch\Session $session
     */
    public function __construct($id, $secret, \Arch\Registry\Session $session)
    {
        $this->id       = $id;
        $this->secret   = $secret;
        $this->session  = $session;
    }
    
    /**
     * Instanciate and return social clients
     * @param string $client
     * @return \Social
     */
    public static function factory($client)
    {
        $instance = null;
        $keys = self::getConfig();
        
        switch ($client) {
            case 'twitter':
                $id = $keys[$client]['id'];
                $secret = $keys[$client]['secret'];
                $instance = new \Demo\Twitter($id, $secret, app()->getSession());
                break;
            case 'facebook':
                $id = $keys[$client]['id'];
                $secret = $keys[$client]['secret'];
                $instance = new \Demo\Facebook($id, $secret, app()->getSession());
                break;
            case 'google':
                $id = $keys[$client]['id'];
                $secret = $keys[$client]['secret'];
                $instance = new \Demo\Google($id, $secret, app()->getSession());
                break;
        }
        if (is_null($instance)) {
            throw new Exception('Invalid social client');
        }
        return $instance;
    }
    
    /**
     * Returns social clients keys configuration
     * @return array
     */
    public static function getConfig()
    {
        return array(
            'twitter' => array(
                'id' => '', // consumer key
                'secret' => '' // consumer secret
            ),
            'facebook' => array(
                'id' => '', // App ID
                'secret' => '' // App Secret
            ),
            'google' => array(
                'id' => '', // Client ID
                'secret' => '' // Client Secret
            )
        );
    }

    /**
     * Checks if current client session is valid
     */
    public abstract function isValid();
    
    /**
     * Starts social client workflow; redirect should be the same as start
     */
    public abstract function connect($redirect_uri);
    
    /**
     * Returns client API objects; may not be the same as oauth client
     */
    public abstract function getApi();

    /**
     * Returns the own social profile
     */
    public abstract function getProfile();
    
    /**
     * Proceeds to social client logout; clear session
     */
    public abstract function logout($redirect_uri);
}

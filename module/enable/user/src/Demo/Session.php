<?php
namespace Demo;

/**
 * Description of Session
 *
 * @author mafonso
 */
class Session extends \Arch\Session
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function load($data = array())
    {
        session_start();
        parent::load($_SESSION);
    }
    
    public function save(&$data = array())
    {
        parent::save($_SESSION);
        session_write_close();
    }
    
    public function destroy()
    {
        parent::__destruct();
        session_destroy();
    }
}

?>
